<?php

namespace App\Components;

use App\Views\View;

class TreeCategoryView
{

    protected $data;

    protected $shift;

    protected $category_id;

    public function __construct($data, $product_id, int $shift = 0)
    {
        $this->data = $data;
        $this->shift = $shift;
        $this->category_id = $product_id;
    }

    public function display($path)
    {
        $view = new View();
        $view->categories = $this->data;
        $view->category_id = $this->category_id;
        $view->shift = $this->shift;
        $view->display($path);
    }
}
