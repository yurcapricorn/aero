<!doctype html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $this->page->title; ?> | Админ-панель</title>

    <meta name="description" content="<?php echo $this->page->meta_d; ?>" />
    <meta name="keywords" content="<?php echo $this->page->meta_k; ?>" />

    <link type="text/css" href="/css/panel.css" rel="stylesheet" />
    <link type="text/css" href="/css/errors.css" rel="stylesheet" />

    <script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>

    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
</head>
<body>
<div class="container clearfix">
    <div class="admin left">
        <a href="/admin">Панель администратора</a>
    </div>
    <div class="enter right">
        <a href="#">Выход</a>
    </div>
</div>
<div class="top">
    <div class="container">
        <?php require __DIR__ . '/menu.php'; ?>
    </div>
</div>
