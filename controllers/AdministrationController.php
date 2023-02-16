<?php

namespace app\controllers;

use app\core\Controller;
use app\models\OrderModel;
use mysqli;

class AdministrationController  extends Controller
{

    public function index()
    {
        $this->view("admin","adminLayout",null);
    }

//    public function users()
//    {
//        $this->view("users", "dashboard", null);
//    }

    public function getAllUsers()
    {
        $mysql =  new mysqli("localhost", "root", "", "wbis") or die();

        $dbResult =  $mysql -> query("select * from users;") or die(mysqli_error($mysql));

        $resultArray = [];

        while ($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }

        echo json_encode($resultArray);
    }

    public function sumOrders()
    {
        $year = $_REQUEST["financialReportYear"];
        $orderModel = new OrderModel();
        $data = $orderModel->sumOfOrdersForEachMonth($year);

        echo json_encode($data);
    }

    public function soldForOneMonthAdmin()
    {
        $month = $_REQUEST["monthSelected"];
        $year= $_REQUEST["yearSelected"];
        $orderModel = new OrderModel();
        $data = $orderModel->soldForOneMonth($year,$month);

        echo json_encode($data);

    }

    public function modelsSoldAdmin()
    {
        $datumPrvi = $_REQUEST["datumOd"];
        $datumDrugi = $_REQUEST["datumDoDoDo"];
        $orderModel = new OrderModel();
        $data = $orderModel->modelsSold($datumPrvi,$datumDrugi);

        echo json_encode($data);
    }

    public function authorize()
    {
        return ["Admin"];
    }
}