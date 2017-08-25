<?php require __DIR__ . '/../header.php'; ?>

    <section class="container clearfix">
        <div class="path">
            <span>
                <a href="/admin">Главная</a>
            </span>
            <span>
                <a href="/admin/<?php echo $page->name; ?>"><?php echo $page->title; ?></a>
            </span>
            <span>
                <?php echo $article->title; ?> - Редактирование
            </span>
        </div>
        <main class="wide">

            <h1><?php echo $article->title; ?></h1>
            <div class="panel">
                <form action="/admin/news/save" method="post" class="panel">
                    Заголовок:
                    <input type="text" name="header" value="<?php echo $article->title; ?>" required>
                    Дата:
                    <input type="text" name="header" value="<?php echo $article->date; ?>" required>
                    Изображение:
                    <input type="text" name="header" value="<?php echo $article->image; ?>" required>
                    Текст:
                    <textarea name="text" required><?php echo $article->text; ?></textarea>

                    <input type="submit" value="Отправить">
                </form>
            </div>

        </main>
    </section>

<?php require __DIR__ . '/../footer.php';