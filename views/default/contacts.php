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

            <div class="contacts left">

                <?php echo $page->text; ?>

                <p><span>Написать нам:</span></p>

                <form class="feedback" method="post">
                    <label>Ваше имя: <span>*</span>
                        <input type="text" name="name" placeholder="Введите имя" required>
                    </label>

                    <label>E-mail: <span>*</span>
                        <input type="email" name="email" placeholder="Введите E-mail" required>
                    </label>

                    <label class="message">Вопрос: <span>*</span>
                        <textarea name="message" placeholder="Введите вопрос" required></textarea>
                    </label>

                    <p><span>*</span> - обязательные поля</p>

                    <input type="submit" value="Отправить">
                </form>
            </div>
            <div class="map right">
                <?php echo $page->text1; ?>
            </div>

        </main>
    </section>

<?php require __DIR__ . '/../footer.php';