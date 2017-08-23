<?php require __DIR__ . '/../header.php'; ?>

    <div class="container">

        <?php require __DIR__ . '/../slider.php'; ?>

    </div>
    <section class="container clearfix">
        <aside class="brands left">
            <h2>Бренды</h2>
            <ul>
                <li><a href="#">Kentatsu</a></li>
                <li><a href="#">Neoclima</a></li>
                <li><a href="#">Electrolux</a></li>
                <li><a href="#">Midea</a></li>
                <li><a href="#">Mitsubishi Heavy</a></li>
                <li><a href="#">Panasonic</a></li>
                <li><a href="#">Ballu</a></li>
                <li><a href="#">LG</a></li>
                <li><a href="#">Тропик</a></li>
                <li><a href="#">Тепломаш</a></li>
                <li><a href="#">Sharp</a></li>
                <li><a href="#">Daikin</a></li>
                <li><a href="#">Zanussi</a></li>
                <li><a href="#">RIX</a></li>
                <li><a href="#">Samsung</a></li>
            </ul>
        </aside>
        <main class="tabs left">

            <?php require __DIR__ . '/../tabs.php'; ?>

        </main>
        <aside class="lastNews right">
            <h2>Новости</h2>
            <div>

                <?php foreach ($news as $article): ?>
                    <article>
                        <span class="date"><?php echo $article->date; ?></span>
                        <a href="/news/show/?id=<?php echo $article->id; ?>" class="title"><?php echo $article->title; ?></a>
                        <p><?php echo strip_tags(mb_substr($article->text, 0, 100) . '...'); ?></p>
                    </article>
                <?php endforeach; ?>

            </div>
        </aside>
    </section>
    <div class="about">
        <div class="container clearfix">
            <div class="text left">
                <h2>О компании</h2>

                <?php echo $page->text; ?>

            </div>
            <div class="bigIcons left">
                <div class="ico1"><b></b><a href="#">Бесплатная доставка</a><span><?php echo $page->text1; ?></span></div>
                <div class="ico2"><b></b><a href="#">Сервис и ремонт</a><span><?php echo $page->text2; ?></span></div>
                <div class="ico3"><b></b><a href="#">Лучший выбор</a><span><?php echo $page->text3; ?></span></div>
            </div>
            <div class="lastArticles right">
                <h2>Статьи</h2>

                <?php foreach ($papers as $paper): ?>
                    <article>
                        <a href="/papers/show/?id=<?php echo $paper->id; ?>" class="title"><?php echo $paper->title; ?></a>
                    </article>
                <?php endforeach; ?>

            </div>
        </div>
    </div>

<?php require __DIR__ . '/../footer.php';