<?php require __DIR__ . '/header.php'; ?>

    <section class="container clearfix">
        <div class="path">
            <span>
                <a href="/admin">Главная</a>
            </span>
            <span>
                <a href="/admin/<?php echo $page->name; ?>"><?php echo $page->title; ?></a>
            </span>
            <span>
                <?php echo $item->title; ?> - Редактирование
            </span>
        </div>
        <main class="wide">

            <h1><?php echo $item->title; ?></h1>
            <div class="panel">
                <form action="/admin/<?php echo $page->name; ?>/save" method="post" class="panel">
                    Id:
                    <input type="text" name="header" value="<?php echo $item->id; ?>" readonly>
                    Заголовок:
                    <input type="text" name="header" value="<?php echo $item->title; ?>" required>
                    Дата:
                    <input type="text" name="header" value="<?php echo $item->date; ?>" required>
                    Автор:
                    <select name="author_id">
                        <option value=""></option>

                        <?php foreach ($this->authors as $author): ?>

                            <option value="<?php echo $author->id; ?>" <?php if (!empty($this->article->author_id) && $author->id == $this->article->author_id){?> selected<?php } ?>>
                                <?php echo $author->name; ?>
                            </option>

                        <?php endforeach; ?>

                    </select>
                    Изображение:
                    <input type="text" name="header" value="<?php echo $item->image; ?>" required>
                    Текст:
                    <textarea name="text" required><?php echo $item->text; ?></textarea>

                    <input type="submit" value="Отправить">
                </form>
            </div>

        </main>
    </section>

<?php require __DIR__ . '/footer.php';