<?php require __DIR__ . '/../header.php'; ?>

    <section class="container clearfix">
        <div class="path">
            <span>
                <a href="/">Главная</a>
            </span>
            <span>
                <a href="/<?php echo $page->name; ?>"><?php echo $page->title; ?></a>
            </span>
            <span>
            <a href="#">Эко</a>
        </span>
            <span>
            <a href="#">Мойки воздуха</a>
        </span>
        </div>
        <main class="product left">
            <div class="productItem clearfix">
                <div class="box left">
                    <div class="img left">
                        <a href="/images/<?php echo $page->name; ?>/<?php echo $item->image; ?>"><img src="/images/<?php echo $page->name; ?>/<?php echo $item->image; ?>"></a>
                    </div>
                    <ul class="images right">
                        <li>
                            <a href="/images/catalog/1/1.jpg">
                                <img class="current" src="/images/catalog/1/1.jpg">
                            </a>
                        </li>
                        <li>
                            <a href="/images/catalog/1/2.jpg">
                                <img src="/images/catalog/1/2.jpg">
                            </a>
                        </li>
                        <li>
                            <a href="/images/catalog/1/1.jpg">
                                <img src="/images/catalog/1/1.jpg">
                            </a>
                        </li>
                        <li>
                            <a href="/images/catalog/1/2.jpg">
                                <img src="/images/catalog/1/2.jpg">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="desc right">
                    <div class="title">
                        <h1><?php echo $item->title; ?></h1>
                        <div class="articul">Артикул 012050025</div>
                    </div>
                    <div class="compareBlock">
                        <div class="active right">
                            <a href="#">Список сравнения</a>
                        </div>
                        <div class="nal left yes">Есть в наличии</div>
                        <label><input type="checkbox">Сравнить</label>
                    </div>
                    <div class="priceBlock clearfix">
                        <div class="price left">Цена:<span class="usd">$ 260</span><span><?php echo $item->price; ?> р.</span></div>
                    </div>
                    <p>Количество:</p>
                    <div class="actionBlock">
                        <div class="countBlock left">
                            <div class="pm right">
                                <a href="#" class="p"></a>
                                <a href="#" class="m"></a>
                            </div>
                            <input type="text" class="count right" name="quantity" value="1" size="5">
                            <a href="#" class="cart left"></a>
                        </div>
                        <div class="btn buy left">
                            <a href="#">купить<b></b></a>
                        </div>
                        <div class="btn alt right">
                            <a href="#">быстрый заказ<b></b></a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tabs_wrapper">
                <div class="category clearfix">
                    <span class="current tabs"><a href="#atab0" class="tabs" id="tab0">Описание</a></span>
                    <span class="tabs"><a href="#atab1" class="tabs" id="tab1">Характеристики</a></span>
                    <span class="tabs"><a href="#atab3" class="tabs" id="tab3">Отзывы</a></span>
                </div>
                <div class="tabs con_tab active" id="con_tab0">
                    <a name="atab0"></a>
                    <h2>Описание Ballu BSA-07HN1:</h2>
                    <p>Инженерам и дизайнерам Ballu удалось создать прибор, сочетающий в себе самые передовые технологии. Результат – невероятно стильный, интуитивно легкий в управлении и
                        потрясающе функциональный кондиционер i Green.</p>
                    <p>Отличительные особенности:</p>
                    <ul>
                        <li>Стильный дизайн</li>
                        <li>Скрытый дисплей, становящийся видимым при включении кондиционера</li>
                        <li>Эргономичный и интуитивно понятный ИК-пульт</li>
                        <li>Воздушный фильтр высокой плотности GREEN- в 3 раза более эффективный</li>
                        <li>Современная 3-компонентная система фильтрации Combo 3 &#40;Катехин/ Витамин С/Угольный&#41;</li>
                        <li>Генератор холодной плазмы</li>
                        <li>Функция I FEEL</li>
                        <li>Режим работы SLEEP</li>
                        <li>Режим работы SUPER</li>
                        <li>Индикация реального времени на пульте ДУ</li>
                        <li>Функция TIMER включения/выключения кондиционера по времени</li>
                        <li>Функция отключения дисплея при работе кондиционера DISPLAY</li>
                        <li>Интеллектуальный DEFROST</li>
                        <li>Возможность изменения стороны отвода дренажа</li>
                    </ul>
                    <div class="line"></div>
                </div>
                <div class="tabs con_tab" id="con_tab1">
                    <a name="atab1"></a>
                    <h2>Характеристики Ballu BSA-07HN1:</h2>
                    <table class="feature">
                        <tr><td>Страна:</td><td>Китай</td></tr>
                        <tr><td>Производитель:</td><td>Ballu</td></tr>
                        <tr><td>Гарантия:</td><td>3 года</td></tr>
                        <tr><td>Цвет:</td><td>Белый</td></tr>
                        <tr><td>Обслуживаемая площадь, кв. м:</td><td>21</td></tr>
                        <tr><td>Уровень шума, Дб:</td><td>27</td></tr>
                        <tr><td>Электропитание, В:</td><td>220В</td></tr>
                        <tr><td>Потребляемая энергия, Вт:</td><td>700</td></tr>
                        <tr><td>Пульт ДУ:</td><td>Есть</td></tr>
                        <tr><td>Воздухообмен, куб.м/час:</td><td>480</td></tr>
                        <tr><td>Вес, кг:</td><td>23.3</td></tr>
                        <tr><td>Габариты, см:</td><td>60x50x23.2</td></tr>
                        <tr><td>Вес внутреннего блока, кг:</td><td>6.2</td></tr>
                        <tr><td>Габариты внутреннего блока, см:</td><td>74.2x25x21.8</td></tr>
                        <tr><td>Тип внутреннего блока:</td><td>Настенный</td></tr>
                        <tr><td>Инверторное управление мощностью:</td><td>Нет</td></tr>
                        <tr><td>Мощность охлаждения, Вт:</td><td>1950</td></tr>
                        <tr><td>Мощность обогрева, Вт:</td><td>2170</td></tr>
                        <tr><td>Тип хладагента:</td><td>R410A</td></tr>
                        <tr><td>Диаметр труб (жидкость), мм:</td><td>6.35 мм (1/4&quot;)</td></tr>
                        <tr><td>Диаметр труб (газ), мм:</td><td>9.52 мм (3/8&quot;)</td></tr>
                        <tr><td>Максимальная длина магистрали, м:</td><td>15</td></tr>
                        <tr><td>Максимальный перепад высот, м:</td><td>5</td></tr>
                        <tr><td>Автоматический режим:</td><td>Есть</td></tr>
                        <tr><td>Автоперезапуск:</td><td>Есть</td></tr>
                        <tr><td>Самодиагностика:</td><td>Есть</td></tr>
                        <tr><td>Зимний комплект:</td><td>Нет</td></tr>
                        <tr><td>Плазменный фильтр:</td><td>Есть</td></tr>
                        <tr><td>Фильтры тонкой очистки воздуха:</td><td>Есть</td></tr>
                        <tr><td>Осушение:</td><td>Есть</td></tr>
                    </table>
                    <div class="line"></div>
                </div>
                <div class="tabs con_tab" id="con_tab3">
                    <a name="atab3"></a>
                    <h2>Отзывы</h2>
                    <div class="reviews">
                        <form method="post" class="clearfix">

                            <h3>Оставить отзыв</h3>

                            <input type="hidden" name="product" value="2155" />

                            <label>Ваше имя:<span>*</span><input type="text" name="name"></label>

                            <label>E-mail:<span>*</span><input type="email" name="email"></label>

                            <div class="rate clearfix">
                                <div class="left">Оценка товара: <span>*</span></div>
                                <div class="left">
                                    <label><input type="radio" name="rate" value="1">1</label>
                                    <label><input type="radio" name="rate" value="2">2</label>
                                    <label><input type="radio" name="rate" value="3">3</label>
                                    <label><input type="radio" name="rate" value="4">4</label>
                                    <label><input type="radio" name="rate" value="5">5</label>
                                </div>
                            </div>

                            <label>
                                <div class="left">Сообщение:<span>*</span></div>
                                <textarea name="review" class="required"></textarea>

                            </label>
                            <span>*</span> - обязательные поля
                            <input type="submit" class="right" value="Отправить">

                        </form>
                    </div>
                    <div class="line"></div>
                </div>
            </div>
        </main>

        <aside class="filter right">
            <div class="brand">
                <h3>Производитель</h3>
                <a href="#">
                    <img src="/images/brands/1.jpg">
                </a>
                <div class="courier"><span></span></div>
                <p>Доставка:</p>
                <p><span class="bold">Доставка курьером</span><br>Сроки: от 1 до 3 дней</p>

            </div>

            <div class="watch">
                <h3>Вы смотрели</h3>

                <article>
                    <a href="#" class="img">
                        <img src="/images/catalog/4.png">
                    </a>
                    <a href="#" class="title">Тепловая завеса Тепломаш КЭВ-6П3232Е</a>
                    <div class="btn">
                        <a href="#">Подробнее</a>
                    </div>
                </article>

                <article>
                    <a href="#" class="img">
                        <img src="/images/catalog/5.png">
                    </a>
                    <a href="#" class="title">Тепловая завеса Тепломаш КЭВ-6П3031Е</a>
                    <div class="btn">
                        <a href="#">Подробнее</a>
                    </div>
                </article>

                <article>
                    <a href="#" class="img">
                        <img src="/images/catalog/2.png">
                    </a>
                    <a href="#" class="title">Electrolux EACM-10EZ/N3</a>
                    <div class="btn">
                        <a href="#">Подробнее</a>
                    </div>
                </article>

            </div>
        </aside>

    </section>

<?php require __DIR__ . '/../footer.php';