<?php

namespace app\models;

use app\core\DbModel;

class OrderModel extends DbModel
{
    public $id;
    public $order_date;
    public $total_price;
    public function tableName()
    {
        return "orders";
    }

    public function attributes(): array
    {
        return [
            "total_price",
            "order_date"
        ];
    }

    public function sumOfOrdersForEachMonth($year)
    {
        $db = $this->db->con();

        $sqlString = "Select sum(orders.total_price) as total_price from orders where year(orders.order_date) = '$year' group by month(orders.order_date);";
        $dataResult = $db->query($sqlString) or die();

        $resultArray = [];

        while($result = $dataResult->fetch_assoc())
        {
            $resultArray[] = $result;
        }
        return $resultArray;
    }

    public function soldForOneMonth($year, $month)
    {
        $db = $this->db->con();

        $sqlString = "SELECT SUM(products.price) as suma FROM order_items
                        Inner join products on order_items.product_id = products.id
                        Inner join orders on order_items.order_id = orders.id
                        Where year(orders.order_date) = '$year' and 
                        month(orders.order_date) = '$month'
                        group by products.brand;";

        $dataResult = $db->query($sqlString) or die();

        $resultArray = [];

        while($result = $dataResult->fetch_assoc())
        {
            $resultArray[] = $result;
        }
        return $resultArray;
    }

    public function modelsSold($datumOd, $datumDo)
    {
        $db = $this->db->con();

        $sqlString = "SELECT products.model as model, sum(order_items.quantity) as modelsSold 
                        from order_items inner join orders on order_items.order_id = orders.id 
                            inner join products on order_items.product_id = products.id 
                        where orders.order_date BETWEEN '$datumOd' and '$datumDo' group by products.model";

        $dataResult = $db->query($sqlString) or die();

        $resultArray = [];

        while($result = $dataResult->fetch_assoc())
        {
            $resultArray[] = $result;
        }
        return $resultArray;
    }
}