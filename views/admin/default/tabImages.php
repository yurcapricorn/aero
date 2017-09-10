<div class="upload clearfix">
    <h3>Изображение для слайдера</h3>
    <div class="left">
        <img src="/images/<?php echo !empty($item->sliderImage) ? $page->name . '/' . $item->sliderImage : 'noImage.png'; ?>" />
    </div>
    <?php if (!empty($item->id)) : ?>
        <label>Изображение (типы jpg | png | gif размером не более 5 мегабайт будет приведено к размерам 930х373px):
            <input type="text" name="image" value="<?php echo $item->sliderImage; ?>" readonly>
        </label>
        <form action="/admin/<?php echo $page->name; ?>/upload" method="post" enctype="multipart/form-data" class="alt">
            <input type="hidden" name="id" value="<?php echo $item->id; ?>">
            <input type="hidden" name="dir" value="<?php echo $page->name; ?>">
            <input type="file" name="image">
            <input type="submit" value="Загрузить">
        </form>
    <?php endif; ?>
</div>

<div class="upload clearfix">
    <h3>Изображение товара</h3>
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
