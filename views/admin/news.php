<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Новости</title>
    <link type="text/css" rel="stylesheet" href="/css/style.css" />
</head>
<body>

<div class="menu">
    <div class="right"><a href="/admin/news">Администрирование</a></div>
    <div class="left"><a href="/">Главная</a> | </div>
    <div class="left"><a href="/">О магазине</a> | </div>
    <div class="left"><a href="/">Доставка и оплата</a> | </div>
    <div class="left"><a href="/">Услуги</a> | </div>
    <div class="left"><a href="/">Вопросы и ответы</a> | </div>
    <div class="left"><a href="/news">Новости</a> | </div>
    <div class="left"><a href="/news">Статьи</a> | </div>
    <div class="left"><a href="/news">Контакты</a> | </div>
</div>
<div class="container">
    <a href="/admin/news/edit" class="new block">Создать статью</a>

<?php foreach ($this->news as $article): ?>

        <div class="news">
            <div><a href="/admin/news/delete/?id=<?php echo $article->id; ?>" class="delete right"></a></div>
            <div><a href="/admin/news/edit/?id=<?php echo $article->id; ?>" class="update right"></a></div>
            <div><a href="/admin/news/edit" class="add right"></a></div>

            <h4><a href="/admin/news/one/?id=<?php echo $article->id; ?>"><?php echo $article->header; ?></a></h4>
            <div class="text">
                <?php echo strip_tags(mb_substr($article->text, 0, 400) . '...'); ?>
            </div>
        </div>

    <?php endforeach; ?>

</div>

</body>
</html>