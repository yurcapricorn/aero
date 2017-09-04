<?php

namespace App\Controllers\Admin;

use App\Logger;
use App\Config;
use App\Models\Page;
use App\Models\Author;
use App\Models\Article;
use App\Components\Uploader;
use App\Controllers\Controller;
use App\Components\ImageProcessor;
use App\Exceptions\DbException;
use App\Exceptions\NotFoundException;
use App\Exceptions\UploaderException;

/*
 * Class Admin\News
 * Класс контроллера админ-панели News
 *
 * @package App\Controllers\Admin
 */
class News extends Controller
{
    /*
     * Метод actionDefault
     * Выводит список всех новостей в обратном порядке
     */
    protected function actionDefault()
    {
        $this->view->page  = Page::findByName('news');
        $this->view->items = Article::findAllLast();
        $this->view->display(__DIR__ . '/../../../views/admin/news.php');
    }

    /*
     * Метод actionEdit
     * Выводит форму добавления/редактирования статьи
     */
    protected function actionEdit()
    {
        if (!empty($_GET['id'])) {
            $this->view->item = Article::findById((int)$_GET['id'] ?? null);
            if (empty($this->view->item)) {
                $exc = new NotFoundException('Новость не найдена!');
                Logger::getInstance()->error($exc);
                throw $exc;
            }
        }
        $this->view->page    = Page::findByName('news');
        $this->view->authors = Author::findAll();
        $this->view->display(__DIR__ . '/../../../views/admin/article.php');
    }

    /*
     * Метод actionSave
     * Сохраняет статью в БД
     */
    protected function actionSave()
    {
        if (!empty($_POST['title']) && !empty($_POST['text'])) {
            if (!empty($_POST['id'])) {
                $item = Article::findById((int)$_POST['id'] ?? null);

                if (empty($item)) {
                    $exc = new NotFoundException('Новость не найдена!');
                    Logger::getInstance()->error($exc);
                    throw $exc;
                }
            } else {
                $item = new Article();
            }
            $item->fill($_POST);

            if (empty($_POST['author_id'])) {
                $item->author_id = null;
            }

            if (false === $item->save()) {
                $exc = new DbException('Невозможно сохранить запись в БД.');
                Logger::getInstance()->error($exc);
                throw $exc;
            }
            header('Location: /admin/news');
            die();
        }
    }

    /*
     * Метод actionUpload
     * Загружает картинку на сервер
     */
    protected function actionUpload()
    {
        $config = Config::getInstance()->data;
        $file   = new Uploader('image');
        if (false === $file->path($config['image']['path'])->upload()) {
            $exc = new UploaderException('Невозможно загрузить изображение.');
            Logger::getInstance()->error($exc);
            throw $exc;
        }

        $image = new ImageProcessor();
        $newImageName = $file->path . $file->destination . $file->name;
        if (false === $image->load($newImageName)->resizeToWidth(130)->save($newImageName, $image->imageType)) {
            $exc = new UploaderException('Невозможно обработать изображение.');
            Logger::getInstance()->error($exc);
            throw $exc;
        }

        $item = Article::findById((int)$_POST['id'] ?? null);
        if (empty($item)) {
            $exc = new NotFoundException('Новость не найдена!');
            Logger::getInstance()->error($exc);
            throw $exc;
        }
        $oldImageName = $file->path . $file->destination . $item->image;
        if (null !== $item->image && is_readable($oldImageName)) {
            if (false === unlink($oldImageName)) {
                $exc = new UploaderException('Невозможно удалить старое изображение.');
                Logger::getInstance()->error($exc);
                throw $exc;
            }
        }

        $item->image = $file->name;
        if (false === $item->save()) {
            $exc = new DbException('Невозможно записать изменения в БД.');
            Logger::getInstance()->error($exc);
            throw $exc;
        }
        header('Location: /admin/news/edit/?id=' . (int)$_POST['id']);
        die();
    }

    /*
     * Метод actionDelete
     * Удаляет новость из БД
     */
    protected function actionDelete()
    {
        $item = Article::findById((int)$_GET['id'] ?? null);
        if (empty($item)) {
            $exc = new NotFoundException('Новость не найдена!');
            Logger::getInstance()->error($exc);
            throw $exc;
        }

        $config = Config::getInstance()->data;
        $file   = $config['image']['path'] . 'news/' . $item->image;
        if (null !== $item->image && is_readable($file)) {
            if (false === unlink($file)) {
                $exc = new UploaderException('Не удалось удалить изображение!');
                Logger::getInstance()->error($exc);
                throw $exc;
            }
        }

        if (false === $item->delete()) {
            $exc = new DbException('Невозможно удалить запись из БД.');
            Logger::getInstance()->error($exc);
            throw $exc;
        }
        header('Location: /admin/news');
        die();
    }
}
