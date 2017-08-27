<!doctype html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php if (!empty($page->title)) { echo $this->page->title; } ?> | АэроКлимат</title>

    <meta name="description" content="<?php if (!empty($page->meta_d)) { echo $page->meta_d; } ?>" />
    <meta name="keywords" content="<?php if (!empty($page->meta_k)) { echo $page->meta_k; } ?>" />

    <link type="text/css" href="/css/style.css" rel="stylesheet" />
    <link type="text/css" href="/css/catalog.css" rel="stylesheet" />
    <link type="text/css" href="/css/errors.css" rel="stylesheet" />
    <link type="text/css" href="/css/jcarousel.css" rel="stylesheet" />
    <link type="text/css" href="/css/tabs.css" rel="stylesheet" />
    <link type="text/css" href="/css/calc.css" rel="stylesheet" />

    <script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/js/jquery.jcarousel.min.js"></script>
    <script type="text/javascript" src="/js/jcarousel.js"></script>
    <script type="text/javascript" src="/js/scripts.js"></script>
    <script type="text/javascript" src="/js/calc.js"></script>

    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
</head>
<body>
<div class="top">
    <div class="container">

        <?php require __DIR__ . '/menu.php'; ?>

        <div class="enter right">
            <a href="#">Вход</a>
        </div>
        <div class="reg right">
            <a href="/auth/registration.php">Регистрация</a>
        </div>
    </div>
</div>
<header class="container">
    <div class="logo left">
        <span class="right"><a href="/">Кондиционирование и климатическое оборудование</a></span>
        <a href="/"><img src="/images/logo.png" width="260" height="100" /></a>
    </div>
    <div class="work left">
        <p class="tel"><span>8 (383) </span>381-93-86</p>
        <p class="time">09:00 - 19:00 <span>/пн-пт/</span><br />09:00 - 18:00 <span>/сб/</span></p>
        <p class="email"><a href="mailto:mail@aero-nsk.ru">mail@aero-nsk.ru</a></p>
    </div>
    <div class="basket right">
        <div class="title"><a>КОРЗИНА</a></div>
        <div>
            <div class="inf left">Сумма: <span>0 р.</span></div>
            <div class="inf right">Товаров: <span>0</span></div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="buttons clearfix">
        <div class="relative left">
            <div class="btn catalog darrow"><a href="/catalog/">Каталог товаров<b></b></a></div>

            <?php require __DIR__ . '/catalog.php'; ?>

        </div>
        <div class="search left">
            <form class="relative left" action="#">
                <input id="search" class="input" type="text" name="q" size="40" maxlength="50" placeholder="Введите поисковый запрос" />
                <button name="s" type="submit" value="Y"></button>
            </form>
        </div>

        <div class="btn call left">
            <a href="#">Закажите звонок<b></b></a>
        </div>
        <div class="order_header btn right"><a href="#">Оформить заказ<b></b></a></div>
    </div>
</header>
