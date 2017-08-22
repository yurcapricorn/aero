<?php require __DIR__ . '/../header.php'; ?>

<section class="container clearfix">
    <div class="path">
        <span>
            <a href="/">Главная</a>
        </span>
        <span>
            <?php echo $this->page->title; ?>
        </span>
    </div>

    <main class="narrow left">
        <h1><?php echo $this->item->title; ?></h1>
        <img class="left" src="/images/<?php echo $this->item->image; ?>" width="270"/>
        <span class="date"><?php echo $this->item->date; ?></span>
        <?php echo $this->item->text; ?>
    </main>

    <aside class="lastItems right">
        <h2>Другие <?php echo mb_strtolower($this->page->title); ?></h2>

        <?php foreach ($this->items as $item): ?>

            <article>
                <span class="date"><?php echo $item->date; ?></span>
                <a href="/<?php echo $this->page->name; ?>/one/?id=<?php echo $item->id; ?>"><?php echo $item->title; ?></a>
            </article>

        <?php endforeach; ?>

    </aside>
</section>

<?php require __DIR__ . '/../footer.php';
