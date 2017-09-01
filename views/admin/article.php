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
                <div class="upload clearfix">
                    <img class="left" src="/images/<?php echo !empty($item->image) ?
                        $page->name . '/' . $item->image : 'noImage.png'; ?>" width="130"/>

                    <label>Изображение (только типы jpg | png | gif размером не более 5 мегабайт):
                        <input type="text" name="image" value="<?php echo $item->image; ?>" readonly>
                    </label>
                    <form action="/admin/<?php echo $page->name; ?>/upload" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                        <input type="hidden" name="dir" value="<?php echo $page->name; ?>">
                        <input type="file" name="image">
                        <input type="submit" value="Загрузить">
                    </form>
                </div>
                <form action="/admin/<?php echo $page->name; ?>/save" method="post" class="panel">
                    Id:
                    <input type="text" name="id" value="<?php echo $item->id; ?>" readonly>
                    Заголовок:
                    <input type="text" name="title" value="<?php echo $item->title; ?>" required>
                    Дата:
                    <input type="date" name="date" value="<?php echo $item->date; ?>" required>
                    Автор:
                    <select name="author_id">
                        <option value=""></option>

                        <?php foreach ($this->authors as $author) : ?>
                            <option value="<?php echo $author->id; ?>"
                                <?php if (!empty($item->author_id) && $author->id === $item->author_id) :?>
                                    selected
                                <?php endif; ?>>
                                <?php echo $author->name; ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                    Текст:
                    <textarea name="text" required><?php echo $item->text; ?></textarea>

                    <input type="submit" value="Отправить">
                </form>
            </div>

        </main>
    </section>

<?php require __DIR__ . '/footer.php';