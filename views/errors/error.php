<?php require __DIR__ . '/../header.php'; ?>

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
            <div class="<?php echo $page->name; ?>"></div>
        </main>
    </section>

<?php require __DIR__ . '/../footer.php';
