<table class="product">
    <tr>
        <th>Цена</th>
        <td><input type="text" name="id" value="<?php echo !empty($item->price) ? $item->price : ''; ?>" required></td>
    </tr>
    <tr>
        <th>Количество:</th>
        <td><input type="text" name="id" value="<?php echo !empty($item->quantity) ? $item->quantity : '0'; ?>"></td>
    </tr>
    <tr>
        <th>Скидка:</th>
        <td><input type="text" name="id" value="<?php echo !empty($item->discount) ? $item->discount : ''; ?>"></td>
    </tr>
</table>
