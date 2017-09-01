<?php

namespace App\Controllers\Admin;

use App\Logger;
use App\Models\Page;
use App\Config;
use App\Controllers\Controller;
use App\Models\Article;
use App\Models\Author;
use App\Exceptions\NotFoundException;

/*
 * Class Admin\News
 * Класс контроллера админ-панели News
 *
 * @package App\Controllers\Admin
 */
class News extends Controller
{
    /*
     * Метод actionAll
     * Выводит список всех новостей
     */
    protected function actionDefault()
    {
        $this->view->items = Article::findAll();
        $this->view->page  = Page::findByName('news');
        $this->view->display(__DIR__ . '/../../../views/admin/news.php');
    }

    /*
     * Метод actionEdit
     * Выводит форму редактирования статьи
     */
    protected function actionEdit()
    {
        if (!empty($_GET['id'])) {
            $id = (int)$_GET['id'];
            $this->view->item = Article::findById($id);

            if (empty($this->view->item)) {
                $exc = new NotFoundException('Новость не найдена!');
                Logger::getInstance()->error($exc);
                throw $exc;
            }
        }
        $this->view->page  = Page::findByName('news');
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
                $item = Article::findById((int)$_POST['id']);

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

            if (true === $item->save()) {
                header('Location: /admin/news');
                die();
            }
        }
    }

    /*
     * Метод actionUpload
     * Загружает картинку на сервер
     */
    protected function actionUpload()
    {
        //var_dump($_FILES);die;
        $config = Config::getInstance()->data;
        $file = new Uploader('image');
        $file->path($config['image']['path'])->upload();

        $image = new Image();
        $image->load($file->path . $file->destination . $file->name);
        $image->resizeToWidth(130);
        $image->save($file->path . $file->destination . $file->name);

        $item = Article::findById((int)$_POST['id']);
        if (null !== $item->image && is_readable($item->image)) {
            unlink($file->path . $file->destination . $item->image);
        }

        $item->image = $file->name;
        $item->save();
        header('Location: /admin/news/edit/?id=' . (int)$_POST['id']);
    }

    /*
     * Метод actionDelete
     * Удаляет новость из БД
     */
    protected function actionDelete()
    {
        $this->view->item = Article::findById($_GET['id'] ?? null);
        if (empty($this->view->item)) {
            $exc = new NotFoundException('Новость не найдена!');
            Logger::getInstance()->error($exc);
            throw $exc;
        }

        if (true === $this->view->item->delete()) {
            header('Location: /admin/news');
            die();
        }
    }
}
