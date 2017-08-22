<?php require __DIR__ . '/../header.php'; ?>

<section class="container clearfix">
    <div class="path">
        <span>
            <a href="/">Главная</a>
        </span>
        <span>
            Новости
        </span>
    </div>
    <main class="wide">
        <h1>Новости</h1>

        <?php foreach ($this->items as $item): ?>

            <article class="clearfix">
                <img class="left" src="/images/<?php echo $item->image; ?>" width="130"/>
                <span class="date"><?php echo $item->date; ?></span>
                <a href="/news/one/?id=<?php echo $item->id; ?>" class="title"><?php echo $item->title; ?></a>
                <p><?php echo strip_tags(mb_substr($item->text, 0, 400) . '...'); ?></p>
            </article>

        <?php endforeach; ?>

    </main>
</section>

<?php require __DIR__ . '/../footer.php';