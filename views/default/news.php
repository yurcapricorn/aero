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

        <?php foreach ($this->news as $article): ?>

            <article class="clearfix">
                <img class="left" src="/images/news/<?php echo $article->image; ?>" width="130"/>
                <span class="date"><?php echo $article->date; ?></span>
                <a href="/news/one/?id=<?php echo $article->id; ?>" class="title"><?php echo $article->title; ?></a>
                <p><?php echo strip_tags(mb_substr($article->text, 0, 400) . '...'); ?></p>
            </article>

        <?php endforeach; ?>

    </main>
</section>

<?php require __DIR__ . '/../footer.php';