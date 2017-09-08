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

        <div class="add">
            <a href="/admin/<?php echo $page->name; ?>/edit">Добавить товар</a>
        </div>

        <table class="product">
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Активность</th>
                <th>Артикул</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Дата изменения</th>
                <th colspan="2"></th>
            </tr>
            <?php foreach ($items as $item) : ?>
            <tr>
                <td><?php echo $item->id; ?></td>
                <td class="leftText">
                    <a href="/admin/<?php echo $page->name; ?>/edit/?id=<?php echo $item->id; ?>">
                        <?php echo $item->title; ?>
                    </a>
                </td>
                <td><?php echo $item->activity ? 'Да' : 'Нет'; ?></td>
                <td><?php echo $item->articul; ?></td>
                <td class="rightText"><?php echo $item->price; ?></td>
                <td><?php echo $item->quantity; ?></td>
                <td><?php echo $item->updated_at; ?></td>
                <td class="update">
                    <a href="/admin/<?php echo $page->name; ?>/edit/?id=<?php echo $item->id; ?>"></a>
                </td>
                <td class="delete">
                    <a href="/admin/<?php echo $page->name; ?>/delete/?id=<?php echo $item->id; ?>"></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

    </main>
</section>

<?php require __DIR__ . '/../footer.php';
