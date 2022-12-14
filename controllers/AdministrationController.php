<?php

namespace app\controllers;

use app\core\Controller;
use mysqli;

class AdministrationController  extends Controller
{
    public function users()
    {
        $this->view("users", "dashboard", null);
    }

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

    public function authorize()
    {
        return ["Admin"];
    }
}