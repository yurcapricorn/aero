<?php require __DIR__ . '/../header.php'; ?>

    <section class="container clearfix">
        <div class="path">
            <span>
                <a href="/admin">Главная</a>
            </span>
            <span>
                <?php echo $page->title; ?> - Редактирование
            </span>
        </div>
        <main class="wide">

            <h1><?php echo $page->title; ?></h1>
            <div class="panel">
                <form action="/admin/news/save" method="post" class="panel">
                    Заголовок:
                    <input type="text" name="header" value="<?php echo $page->title; ?>" required>
                    Заголовок meta description:
                    <input type="text" name="header" value="<?php echo $page->meta_d; ?>" required>
                    Заголовок meta keywords:
                    <input type="text" name="header" value="<?php echo $page->meta_k; ?>" required>
                    Текст:
                    <textarea name="text" required><?php echo $page->text; ?></textarea>

                    <?php if (!empty($page->text1)) : ?>
                        Бесплатная доставка:
                        <textarea name="text1" class="small" required><?php echo $page->text1; ?></textarea>
                    <?php endif; ?>

                    <?php if (!empty($page->text2)) : ?>
                        Сервис и ремонт:
                        <textarea name="text2" class="small" required><?php echo $page->text2; ?></textarea>
                    <?php endif; ?>

                    <?php if (!empty($page->text3)) : ?>
                        Лучший выбор:
                        <textarea name="text3" class="small" required><?php echo $page->text3; ?></textarea>
                    <?php endif; ?>

                    <input type="submit" value="Отправить">
                </form>
            </div>

        </main>
    </section>

<?php require __DIR__ . '/../footer.php';