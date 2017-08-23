<?php require __DIR__ . '/../header.php'; ?>

<section class="container clearfix">
    <div class="path">
        <span>
            <a href="/">Главная</a>
        </span>
        <span>
            <a href="/<?php echo $this->page->name; ?>"><?php echo $page->title; ?></a>
        </span>
    </div>

    <main class="narrow left">
        <h1><?php echo $item->title; ?></h1>
        <img class="left" src="/images/<?php echo $page->name; ?>/<?php echo $item->image; ?>" width="270"/>
        <span class="date"><?php echo $item->date; ?></span>
        <?php echo $item->text; ?>
    </main>

    <aside class="lastItems right">
        <h2>Другие <?php echo mb_strtolower($page->title); ?></h2>

        <?php foreach ($items as $item): ?>
            <article>
                <span class="date"><?php echo $item->date; ?></span>
                <a href="/<?php echo $this->page->name; ?>/show/?id=<?php echo $item->id; ?>"><?php echo $item->title; ?></a>
            </article>
        <?php endforeach; ?>

    </aside>
</section>

<?php require __DIR__ . '/../footer.php';