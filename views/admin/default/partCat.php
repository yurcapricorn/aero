<?php
/**
 * @var int $shift
 * @var int $category_id
 * @var  array $categories
 * @var \App\Views\View $this
 */
?>

<?php foreach ($categories as $key => $value) : ?>
    <option value="<?php echo $key; ?>" <?php if ($value['id'] === $category_id) : ?>selected<?php endif; ?>>
        <?php echo str_repeat('&nbsp;', $shift), $value['title'] ?>
    </option>
    <?php if (!empty($value['children'])) : ?>
        <?php
        (new \App\Components\TreeCategoryView($value['children'], $category_id, $shift + 5))
            ->display(__DIR__ . '/partCat.php');
        ?>
    <?php endif;
endforeach;
