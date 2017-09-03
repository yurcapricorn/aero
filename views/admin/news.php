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
            <article class="clearfix">

                <img class="left" src="/images/<?php echo !empty($item->image) ? $page->name . '/' . $item->image : 'noImage.png'; ?>" width="130"/>
                <span class="date"><?php echo $item->date; ?></span>
                <a href="/admin/<?php echo $page->name; ?>/edit/?id=<?php echo $item->id; ?>" class="title">
                    <?php echo $item->title; ?>
                </a>
                <p><?php echo strip_tags(mb_substr($item->text, 0, 400) . '...'); ?></p>
            </article>
        <?php endforeach; ?>

    </main>
</section>

<?php require __DIR__ . '/footer.php';
