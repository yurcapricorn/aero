<?php require __DIR__ . '/header.php'; ?>

    <section class="container clearfix">
        <div class="path">
        <span>
            <a href="/">Главная</a>
        </span>
            <span>
            Регистрация
        </span>
        </div>
        <main class="narrow left">
            <h1>Регистрация</h1>
            <form action="/Authenticate/register/" method="post" class="auth">
                <label>
                    Имя<span>*</span>
                    <input type="text" name="name">
                </label>
                <label>
                    Фамилия
                    <input type="text" name="last_name">
                </label>
                <label>
                    E-mail<span>*</span>
                    <input type="email" name="email" required>
                </label>
                <label>
                    Пароль<span>*</span>
                    <input type="password" name="password">
                </label>
                <label>
                    Подстверждение пароля<span>*</span>
                    <input type="password" name="confirm_password">
                </label>
                <input type="submit" value="Отправить">
            </form>
            <p>Нажимая кнопку "ЗАРЕГИСТРИРОВАТЬСЯ" Я подтверждаю своё согласие на передачу персональных данных по открытым каналам связи сети Интернет и согласен на их обработку.</p>
        </main>
        <aside class="lastItems right">
            <h2>Другие новости</h2>
            <article>
                <span class="date">01.04.2017</span>
                <a href="/news/1.php">Добро пожаловать в новый офис на Весенней улице!</a>
            </article>
            <article>
                <span class="date">05.04.2017</span>
                <a href="/news/1.php">При заказе кондиционера и монтажа - первое сервисное обслуживание со скидкой 20%!</a>
            </article>
            <article>
                <span class="date">14.05.2017</span>
                <a href="/news/1.php">Полная база товаров на сайте</a>
            </article>
            <article>
                <span class="date">20.06.2017</span>
                <a href="/news/1.php">Начало продаж японских кондиционеров General</a>
            </article>
            <article>
                <span class="date">27.07.2017</span>
                <a href="/news/1.php">Новый бренд в нашем ассортименте - MDV</a>
            </article>
        </aside>
    </section>

<?php require __DIR__ . '/footer.php';