<?php

namespace app\models;

use app\core\DbModel;

class CartItemModel extends DbModel
{
    public $product_id;
    public $quantity;
    public $brand;
    public $model;
    public $description;
    public $price;
    public $image_url;



    public function tableName()
    {
        return [];
    }

    public function attributes(): array
    {
        return [];
    }
}