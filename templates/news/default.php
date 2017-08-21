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
    <div class="left"><a href="/news">Главная</a></div>
</div>
<div class="container">

    <?php foreach ($this->news as $article): ?>

        <div class="news">
            <h4><a href="/news/one/?id=<?php echo $article->id; ?>"><?php echo $article->header; ?></a></h4>
            <div class="text">
                <?php echo strip_tags(mb_substr($article->text, 0, 400) . '...'); ?>
            </div>
        </div>

    <?php endforeach; ?>

</div>

</body>
</html>