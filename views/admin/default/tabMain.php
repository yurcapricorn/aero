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

                    <?php foreach ($categories as $category) : ?>
                        <option value="<?php echo $category->id; ?>"
                            <?php if (!empty($item->author_id) && $author->id === $item->author_id) :?>
                                selected
                            <?php endif; ?>>
                            <?php echo $category->title; ?>
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
