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
            <h1><?php echo $page->title; ?></h1>

            <?php foreach ($items as $item) : ?>
                <article>
                    <h2><?php echo $item->question; ?></h2>
                    <p><?php echo $item->answer; ?></p>
                </article>
            <?php endforeach; ?>

            <form class="faq clearfix" method="post">
                <h3>Задать вопрос</h3>
                <div>
                    <label>Ваше имя: <span>*</span>
                        <input type="text" name="name" placeholder="Введите имя" required>
                    </label>

                    <label>E-mail: <span>*</span>
                        <input type="email" name="email" placeholder="Введите E-mail" required>
                    </label>

                    <label>Телефон:
                        <input type="text" name="phone" placeholder="Введите номер телефона">
                    </label>
                </div>
                <div class="message">
                    <label class="message">Вопрос: <span>*</span>
                        <textarea name="message" placeholder="Введите вопрос" required></textarea>
                    </label>
                    <p><span>*</span> - обязательные поля</p>
                </div>

                <input type="submit" class="right" value="Отправить">
            </form>

        </main>
    </section>

<?php require __DIR__ . '/../footer.php';