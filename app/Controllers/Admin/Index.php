<?php

namespace App\Controllers\Admin;

use App\Logger;
use App\Controllers\Controller;
use App\Models\Page;
use App\Models\Article;
use App\Models\Author;
use App\Exceptions\NotFoundException;

/*
 * Class Admin\Index
 * Класс контроллера админ-панели Index
 *
 * @package App\Controllers\Admin
 */
class Index extends Controller
{
    /*
     * Метод actionAll
     * Выводит список всех новостей
     */
    protected function actionDefault()
    {
        $this->view->page  = Page::findByName('index');
        $this->view->display(__DIR__ . '/../../../views/admin/page.php');
    }

    /*
     * Метод actionEdit
     * Выводит форму редактирования статьи
     */
    protected function actionEdit()
    {
        if (!empty($_GET['id'])) {
            $id = (int)$_GET['id'];
            $this->view->article = Article::findById($id);

            if (empty($this->view->article)) {
                $exc = new NotFoundException('Новость не найдена!');
                Logger::getInstance()->error($exc);
                throw $exc;
            }
        }
        $this->view->authors = Author::findAll();
        $this->view->display(__DIR__ . '/../../../views/admin/article.php');
    }

    /*
     * Метод actionSave
     * Сохраняет статью в БД
     */
    protected function actionSave()
    {
        if (!empty($_POST['header']) && !empty($_POST['text'])){
            if (!empty($_POST['id'])) {
                $article = Article::findById((int)$_POST['id']);

                if (empty($article)) {
                    $exc = new NotFoundException('Новость не найдена!');
                    Logger::getInstance()->error($exc);
                    throw $exc;
                }

            } else {
                $article = new Article();
            }

            $article->fill($_POST);

            if (empty($_POST['author_id'])){
                $article->author_id = null;
            }

            if (true === $article->save()) {
                header('Location: /admin');
                die();
            }
        }
    }

    /*
     * Метод actionDelete
     * Удаляет новость из БД
     */
    protected function actionDelete()
    {
        $this->view->article = Article::findById($_GET['id'] ?? null);
        if (empty($this->view->article)) {
            $exc = new NotFoundException('Новость не найдена!');
            Logger::getInstance()->error($exc);
            throw $exc;
        }

        if (true === $this->view->article->delete()) {
            header('Location: /admin');
            die();
        }
    }
}