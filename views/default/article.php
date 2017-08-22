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
    <div class="news">
        <h4><?php echo $this->article->header; ?></h4>
        <div class="date"><?php echo $this->article->date; ?></div>
        <div class="text"><?php echo $this->article->text; ?></div>
        <div class="author">

            <?php
            if (null !== $this->article->author_id){
                echo $this->article->author->name;
            }
            ?>

        </div>
    </div>
</div>

</body>
</html>