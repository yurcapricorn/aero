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
                <p><span>ИП Медянцев А. В.</span>ИНН 032612658649<br>ОГРНИП 313032717700095</p>

                <p><span>Адрес:</span>Новосибирск, ул. Весенняя, д. 12а</p>

                <p><span>Телефоны: </span>8 (383) 381-93-86</p>

                <p><span>Email: </span><a href="mailto:mail@aero-nsk.ru" >mail@aero-nsk.ru</a></p>

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
                <script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=Y95RTXo3KAGx-U3whEzguy9atiswZEu5&width=450&height=350"></script>
            </div>

        </main>
    </section>

<?php require __DIR__ . '/../footer.php';