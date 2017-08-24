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
        <main class="products left">
            <h1>Каталог</h1>

            <div class="category clearfix">
                <span class="current"><a href="#">Кондиционеры</a></span>
                <span><a href="#">Электрические обогреватели</a></span>
                <span><a href="#">Теплые полы и трубы</a></span>
                <span><a href="#">ЭКО</a></span>
                <span><a href="#">Тепловые завесы и пушки</a></span>
                <span><a href="#">Водонагреватели</a></span>
                <span><a href="#">Радиаторы</a></span>
                <span><a href="#">Котлы</a></span>
                <span><a href="#">Бойлеры</a></span>
            </div>
            <div class="control clearfix">
                <div class="pagination left">
                    <span class="prev"><a href="#"></a></span>
                    <span class="current"><a href="#">1</a></span>
                    <span><a href="#">2</a></span>
                    <span><a href="#">3</a></span>
                    <span><a href="#">4</a></span>
                    <span><a href="#">5</a></span>
                    <span class="next"><a href="#"></a></span>
                </div>
                <div class="view right">
                    <span class="view2 current"><a href="#"></a></span>
                    <span class="view1 "><a href="#"></a></span>
                    <span class="view3 "><a href="#"></a></span>
                </div>
            </div>
            <div class="sortBy clearfix">
                <div class="how">
                    <div class="left">Сортировать по:</div>
                    <span class="rev"><a href="#">Цене</a></span>
                    <span><a href="#">Названию</a></span>
                </div>
                <div class="compareList right active"><a href="#" class="show_comparator">Список сравнения</a></div>
            </div>

            <?php foreach ($items as $key => $item) :
                ++$key;
                if ($key%4 === 0) :
            ?>
                    <article class="last">
                <?php else : ?>
                    <article>
                <?php endif; ?>

                    <label><input type="checkbox">Сравнить</label>
                    <a href="/<?php echo $page->name; ?>/show/?id=<?php echo $item->id; ?>" class="img">
                        <div>
                            <img src="/images/<?php echo $page->name; ?>/<?php echo $item->image; ?>">
                        </div>
                    </a>
                    <a href="/<?php echo $page->name; ?>/show/?id=<?php echo $item->id; ?>" class="title">
                        <?php echo $item->name; ?>
                    </a>
                    <span class="price">
                        <?php echo $item->price; ?> р.
                    </span>
                    <div>
                        <div class="pm right">
                            <a href="#" class="p"></a>
                            <a href="#" class="m"></a>
                        </div>
                        <input type="text" class="count right" name="quantity" value="1" size="5">
                        <a href="#" class="cart left"></a>
                    </div>
                </article>

            <?php endforeach; ?>

            <div class="clear"></div>

            <div class="control clearfix">
                <div class="pagination left">
                    <span class="prev"><a href="#"></a></span>
                    <span class="current"><a href="#">1</a></span>
                    <span><a href="#">2</a></span>
                    <span><a href="#">3</a></span>
                    <span><a href="#">4</a></span>
                    <span><a href="#">5</a></span>
                    <span class="next"><a href="#"></a></span>
                </div>
            </div>
        </main>
        <aside class="filter right">
            <div class="filter">
                <h3>Выбор по параметрам:</h3>
                <form action="#" method="get">
                    <div class="acc">
                        <a href="#" class="current">Цена:</a>
                        <div class="formCost">
                            <label>От:
                                <input type="text" class="min-price" name="filter_min" value="1200" size="5" />
                            </label>
                            <label>До:
                                <input type="text" class="max-price" name="filter_max" value="436800" size="5" />
                            </label>
                        </div>
                    </div>
                    <div class="acc">
                        <a href="#" class="current">Производитель:</a>
                        <div class="made">
                            <label>
                                <input type="checkbox" name="Ballu" value="Y" />Ballu
                            </label>
                            <label>
                                <input type="checkbox" name="Daikin" value="Y" />Daikin
                            </label>
                            <label>
                                <input type="checkbox" name="Electrolux" value="Y" />Electrolux
                            </label>
                            <label>
                                <input type="checkbox" name="Kentatsu" value="Y" />Kentatsu
                            </label>
                            <label>
                                <input type="checkbox" name="LG" value="Y" />LG
                            </label>
                            <label>
                                <input type="checkbox" name="Midea" value="Y" />Midea
                            </label>
                            <label>
                                <input type="checkbox" name="Mitsubishi" value="Y" />Mitsubishi Heavy
                            </label>
                            <label>
                                <input type="checkbox" name="Panasonic" value="Y" />Panasonic
                            </label>
                        </div>
                    </div>
                    <div class="btn">
                        <input type="submit" value="Применить" />
                        <input type="reset" value="Сбросить" />
                    </div>
                </form>
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