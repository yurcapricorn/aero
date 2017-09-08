<?php require __DIR__ . '/../header.php'; ?>

    <section class="container clearfix">
        <div class="path">
            <span>
                <a href="/admin">Главная</a>
            </span>
            <span>
                <a href="/admin/<?php echo $page->name; ?>"><?php echo $page->title; ?></a>
            </span>
            <span>
                <?php echo !empty($item->title) ? $item->title . ' - Редактирование ' : 'Добавление '; ?>
            </span>
        </div>
        <main class="wide">
            <h1><?php echo !empty($item->title) ? $item->title . ' - Редактирование ' : 'Добавление '; ?></h1>

            <div class="panel">
                <div id="tabs_wrapper">
                    <div class="sort clearfix">
                        <span data-id="1" class="first tabs current"><a class="tabs" id="tab1" href="#">Основные</a></span>
                        <span data-id="2" class="tabs"><a class="tabs" id="tab2" href="#">Изображения</a></span>
                        <span data-id="3" class="tabs"><a class="tabs" id="tab3" href="#">Свойства</a></span>
                        <span data-id="4" class="last tabs"><a class="tabs active" id="tab4" href="#">Торговые</a></span>
                    </div>

                    <div class="tabs con_tab active" id="con_tab1">
                        <form action="/admin/<?php echo $page->name; ?>/save" method="post" class="panel">
                            <table class="product">
                                <tr>
                                    <th>ID:</th>
                                    <td><input type="text" name="id" value="<?php echo !empty($item->id) ? $item->id : ''; ?>" readonly></td>
                                </tr>
                                <tr>
                                    <th>Создан:</th>
                                    <td><input type="datetime" name="created" value="<?php echo !empty($item->created) ? $item->created : date("Y-m-d H:i:s"); ?>" readonly></td>
                                </tr>
                                <tr>
                                    <th>Изменен:</th>
                                    <td><input type="datetime" name="updated" value="<?php echo !empty($item->created) ? date("Y-m-d H:i:s") : ''; ?>" readonly></td>
                                </tr>
                                <tr>
                                    <th>Активность:</th>
                                    <td><input type="checkbox" <?php if ('0' !== $item->activity) {?> checked<?php } ?>></td>
                                </tr>
                                <tr>
                                    <th>Слайдер:</th>
                                    <td><input type="checkbox" <?php if ('0' !== $item->slider) {?> checked<?php } ?>></td>
                                </tr>
                                <tr>
                                    <th>Спецпредложения:</th>
                                    <td><input type="checkbox" <?php if ('0' !== $item->isSpecial) {?> checked<?php } ?>></td>
                                </tr>
                                <tr>
                                    <th>Новинки:</th>
                                    <td><input type="checkbox" <?php if ('0' !== $item->isNew) {?> checked<?php } ?>></td>
                                </tr>
                                <tr>
                                    <th>Популярные:</th>
                                    <td><input type="checkbox" <?php if ('0' !== $item->isPopular) {?> checked<?php } ?>></td>
                                </tr>
                                <tr>
                                    <th>Название:</th>
                                    <td><input type="text" name="title" value="<?php echo !empty($item->title) ? $item->title : ''; ?>" required></td>
                                </tr>
                                <tr>
                                    <th>Категория:</th>
                                    <td><select name="category">
                                            <option value=""></option>

                                            <?php foreach ($categories1 as $category1) : ?>
                                                <option value="<?php echo $category1->id; ?>"
                                                    <?php if (!empty($item->author_id) && $author->id === $item->author_id) :?>
                                                        selected
                                                    <?php endif; ?>>
                                                    <?php echo $category1->name; ?>
                                                </option>
                                            <?php endforeach; ?>

                                        </select></td>
                                </tr>
                                <tr>
                                    <th>Производитель:</th>
                                    <td><select name="vendor">
                                            <option value=""></option>

                                            <?php foreach ($vendors as $vendor) : ?>
                                                <option value="<?php echo $vendor->id; ?>"
                                                    <?php if (!empty($item->vendor_id) && $vendor->id === $item->vendor_id) :?>
                                                        selected
                                                    <?php endif; ?>>
                                                    <?php echo $vendor->name; ?>
                                                </option>
                                            <?php endforeach; ?>

                                        </select></td>
                                </tr>
                            </table>







                            Описание:
                            <textarea name="text" required><?php echo !empty($item->text) ? $item->text : ''; ?></textarea>
                            <input type="submit" value="Отправить">
                        </form>
                    </div>

                    <div class="tabs con_tab" id="con_tab2">
                        <div class="upload clearfix">
                            <div class="left">
                                <img src="/images/<?php echo !empty($item->image) ? $page->name . '/' . $item->image : 'noImage.png'; ?>" />
                            </div>
                            <?php if (!empty($item->id)) : ?>
                                <label>Изображение (типы jpg | png | gif размером не более 5 мегабайт будет приведено к размерам 130х130px):
                                    <input type="text" name="image" value="<?php echo $item->image; ?>" readonly>
                                </label>
                                <form action="/admin/<?php echo $page->name; ?>/upload" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                                    <input type="hidden" name="dir" value="<?php echo $page->name; ?>">
                                    <input type="file" name="image">
                                    <input type="submit" value="Загрузить">
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="tabs con_tab" id="con_tab3">
                        3
                    </div>
                    <div class="tabs con_tab" id="con_tab4">
                        4
                    </div>
                </div>




            </div>

        </main>
    </section>

<?php require __DIR__ . '/../footer.php';