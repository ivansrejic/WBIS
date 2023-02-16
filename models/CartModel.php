<?php

namespace app\models;

use app\core\DbModel;

class CartModel extends DbModel
{
    public $cart_items;
    public $total_price;
    //public $quantity;

    public function tableName()
    {
        return [];
    }

    public function attributes(): array
    {
        return [];
    }
}