<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\BrandModel;
use app\models\ListProductModel;
use app\models\ProductModel;

class ProductController extends Controller
{
    public function index()
    {
        return $this->view("products","dashboard",null);
    }

    public function rows()
    {
        $model = new ListProductModel();
        $model->mapData($this->router->request->all());

        echo $model->search() ;
    }

    public function create()
    {
        return $this->view("createProduct", "dashboard", null);
    }

    public function delete()
    {
        $model = new ProductModel();
        $model->mapData($this->router->request->all());

        $model->delete("id='$model->id'");
    }

    public function createProductProcess()
    {
        $model = new ProductModel();
        $model->mapData($this->router->request->all());
        $model->validate();

        if ($model->errors)
        {
            Application::$app->session->setFlash(Application::$app->session->FLASH_MESSAGE_ERROR,"Create not succensfull");
            return $this->view("createProduct", "dashboard", $model);
        }

        $model->create();
        Application::$app->session->setFlash(Application::$app->session->FLASH_MESSAGE_SUCCESS,"Create success bravo :D");

        return $this->view("createProduct", "dashboard", $model);
    }

    public function authorize()
    {
       return [
           "Seller"
       ];
    }
}