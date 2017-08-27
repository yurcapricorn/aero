<?php require __DIR__ . '/header.php'; ?>

<section class="container clearfix">
    <div class="path">
        <span>
            <a href="/">Главная</a>
        </span>
        <span>
            <?php echo $page->title; ?>
        </span>
    </div>

    <main class="wide">
        <h1><?php echo $page->title; ?></h1>

        <div class="add">
            <a href="/admin/<?php echo $page->name; ?>/edit">Добавить <?php echo mb_strtolower($page->title); ?></a>
        </div>

        <?php foreach ($items as $item) : ?>
            <div class="action right">
                <a href="/admin/<?php echo $page->name; ?>/edit/?id=<?php echo $item->id; ?>">Редактировать</a> |
                <a href="/admin/<?php echo $page->name; ?>/delete/?id=<?php echo $item->id; ?>">Удалить</a>
            </div>
            <article>
                <a href="/admin/<?php echo $page->name; ?>/edit/?id=<?php echo $item->id; ?>">
                    <h2><?php echo $item->question; ?></h2>
                </a>
                <p><?php if (!empty($item->answer)) { echo $item->answer; } ?></p>
            </article>
        <?php endforeach; ?>

    </main>
</section>

<?php require __DIR__ . '/footer.php';
