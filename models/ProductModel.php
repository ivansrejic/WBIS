<?php

namespace app\models;

use app\core\DbModel;

class ProductModel extends DbModel
{
    public $id;
    public $brand;
    public $model;
    public $description;
    public $price;
    public $image_url;
    //public $user_id;


    public function rules(): array
    {
       return [
           "brand" => [self::RULE_REQUIRED],
           "model" => [self::RULE_REQUIRED],
           "image_url" => [self::RULE_REQUIRED],
           "price" => [self::RULE_REQUIRED],
       ];
    }

    public function tableName()
    {
        return "products";
    }

    public function attributes(): array
    {
        return [
            "brand",
            "model",
            "description",
            "price",
            "image_url"
        ];
    }

}