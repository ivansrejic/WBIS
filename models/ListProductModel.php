<?php

namespace app\models;

use app\core\DbModel;

class ListProductModel extends DbModel
{
    public $products;
    public $pageIndex;
    public $rowNumbers;
    public string $search = "";

    public function search()
    {

        $dbResult = $this->db->con()->query("SELECT * FROM products WHERE brand LIKE '%$this->search%'");
        //print_r($dbResult->fetch_all());

        $resultArray = [];
        while($result = $dbResult->fetch_assoc())
        {
            $product = new ProductModel();
            $product->mapData($result);
            $resultArray[] = $product;

        }
//        echo "<pre>";
//        var_dump($resultArray);
//        echo "</pre>";
//
//        echo "<pre>";
//        var_dump(json_encode($resultArray));
//        echo "</pre>";

        return json_encode($resultArray);

    }
    public function searchData()
    {

        $dbResult = $this->db->con()->query("SELECT * FROM products WHERE brand LIKE '%$this->search%'");
        //print_r($dbResult->fetch_all());

        $resultArray = [];
        while($result = $dbResult->fetch_assoc())
        {
            $product = new ProductModel();
            $product->mapData($result);
            $resultArray[] = $product;

        }
        $this->products = $resultArray;

        return $this;

    }

    public function tableName()
    {
        return "";
    }

    public function attributes(): array
    {
        return [];
    }

}