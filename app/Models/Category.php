<?php

namespace App\Models;

/*
 * Class Author
 * Модель автора
 *
 * @package App\Models
 *
 * @property string $name
 */
class Category extends Model
{
    protected static $table = 'category';

    public static function getTreeCategories()
    {
        $obj = parent::findAll();

        $data = [];

        foreach ($obj as $value) {
            $data[$value->id] = ['id' => $value->id, 'parent_id' => $value->parent_id, 'title' => $value->title];
        }

        $tree = [];
        foreach ($data as $key => &$node) {
            if (!$node['parent_id']) {
                $tree[$key] = &$node;
                continue;
            }
            $data[$node['parent_id']]['children'][$node['id']] = &$node;
        }
        unset($node);

        return $tree;
    }
}
