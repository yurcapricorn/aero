<?php

namespace App\Controllers\Admin;

use App\Logger;
use App\Models\Page;
use App\Controllers\Controller;
use App\Models\Faq;
use App\Models\Author;
use App\Exceptions\NotFoundException;

/*
 * Class Admin\Faqs
 * Класс контроллера админ-панели Faqs
 *
 * @package App\Controllers\Admin
 */
class Faqs extends Controller
{
    /*
     * Метод actionAll
     * Выводит список всех новостей
     */
    protected function actionDefault()
    {
        $this->view->items = Faq::findAll();
        $this->view->page  = Page::findByName('faqs');
        $this->view->display(__DIR__ . '/../../../views/admin/default/messages.php');
    }

    /*
     * Метод actionEdit
     * Выводит форму редактирования статьи
     */
    protected function actionEdit()
    {
        if (!empty($_GET['id'])) {
            $id = (int)$_GET['id'];
            $this->view->item = Faq::findById($id);

            if (empty($this->view->item)) {
                $exc = new NotFoundException('Новость не найдена!');
                Logger::getInstance()->error($exc);
                throw $exc;
            }
        }
        $this->view->page  = Page::findByName('faqs');
        $this->view->display(__DIR__ . '/../../../views/admin/default/message.php');
    }

    /*
     * Метод actionSave
     * Сохраняет статью в БД
     */
    protected function actionSave()
    {
        if (!empty($_POST['question'])) {
            if (!empty($_POST['id'])) {
                $item = Faq::findById((int)$_POST['id']);

                if (empty($item)) {
                    $exc = new NotFoundException('Новость не найдена!');
                    Logger::getInstance()->error($exc);
                    throw $exc;
                }

            } else {
                $item = new Faq();
            }

            $item->fill($_POST);

            if (true === $item->save()) {
                header('Location: /admin/faqs');
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
            header('Location: /admin/news');
            die();
        }
    }
}