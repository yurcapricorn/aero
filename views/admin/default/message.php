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
                <?php echo $item->question; ?> - Редактирование
            </span>
        </div>
        <main class="wide">

            <h1><?php echo $item->question; ?></h1>
            <div class="panel">
                <form action="/admin/<?php echo $page->name; ?>/save" method="post" class="panel">
                    <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                    Вопрос:
                    <textarea name="question" class="small" required><?php echo $item->question; ?></textarea>
                    Ответ:
                    <textarea name="answer" class="small" required><?php if (!empty($item->answer)) { echo $item->answer; } ?></textarea>

                    <input type="submit" value="Отправить">
                </form>
            </div>

        </main>
    </section>

<?php require __DIR__ . '/../footer.php';