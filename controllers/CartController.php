<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\CartItemModel;
use app\models\CartModel;
use app\models\OrderItemsModel;
use app\models\OrderModel;
use app\models\ProductModel;
use app\models\ResponseMessageModel;

class CartController extends Controller
{
    public function add()
    {
        $responseModel = new ResponseMessageModel();
        $cartModel = Application::$app->session->get(Application::$app->session->CART_SESSION);

        $productModel = new ProductModel();
        $productModel->mapData($this->router->request->all());
        $productModel->mapData($productModel->one("id = $productModel->id"));

        if ($productModel->id === null) {
            $responseModel->success = false;
            $responseModel->message = "Proizvod ne postoji!";

            echo json_encode($responseModel);
            exit;
        }

        if ($cartModel === false) {
            $cartModel = new CartModel();
        }

        $alreadyExist = false;

        foreach ($cartModel->cart_items as $cart_item)
        {
            if ($cart_item->product_id === $productModel->id)
            {
                $alreadyExist= true;
                $cart_item->quantity += 1;
            }
        }

        if (!$alreadyExist)
        {
            $cartItemModel = new CartItemModel();
            //$cartItemModel->mapData($productModel);
            $cartItemModel->product_id = $productModel->id;
            $cartItemModel->brand = $productModel->brand;
            $cartItemModel->model = $productModel->model;
            $cartItemModel->price = $productModel->price;
            $cartItemModel->description = $productModel->description;
            $cartItemModel->image_url = $productModel->image_url;
            $cartItemModel->quantity = 1;
            $cartModel->cart_items[] = $cartItemModel;
        }

        $sum = 0;
        if($cartModel != null && $cartModel->cart_items != null)
        {
            foreach ($cartModel->cart_items as $cart_item) {
                $sum += ($cart_item->price * $cart_item->quantity ?? 1);
            }
        }

        $cartModel->total_price = $sum;

        Application::$app->session->set(Application::$app->session->CART_SESSION, $cartModel);

        $responseModel->success = true;
        $responseModel->message = "Proizvod uspesno dodat!";

        echo json_encode($responseModel);
        var_dump($cartModel);
        exit;
    }

    public function viewCart()
    {
        $cartModel = Application::$app->session->get(Application::$app->session->CART_SESSION);
        if($cartModel === false)
        {
            Application::$app->session->setFlash(Application::$app->session->FLASH_MESSAGE_ERROR,"Cart is empty");
            return $this->partialView("home","empty",null);
        }
        return $this->view("cart","cartLayout",$cartModel);
    }

    public function deleteCart()
    {
        Application::$app->session->remove(Application::$app->session->CART_SESSION);
    }

    public function order()
    {
        $cart = Application::$app->session->get(Application::$app->session->CART_SESSION);

        $order = new OrderModel();
        //$orderItems = new OrderItemsModel();

        $order->mapData($cart);
        $order->order_date = date("Y-m-d");
        $order->create();

        $order->mapData($order->lastCreated());

        foreach($cart->cart_items as $item)
        {
            $orderItems = new OrderItemsModel();
            $orderItems->mapData($item);
            $orderItems->order_id = $order->id;

            $orderItems->create();
        }

        Application::$app->session->setFlash(Application::$app->session->FLASH_MESSAGE_SUCCESS, "Order success");
        Application::$app->session->remove(Application::$app->session->CART_SESSION);
        return $this->view("home","empty",null);

    }

    public function authorize()
    {
        return [];
    }
}