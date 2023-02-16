<?php
require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\AdministrationController;
use app\controllers\AuthController;
use app\controllers\CartController;
use app\controllers\HomeController;
use app\controllers\ProductController;
use app\controllers\UserController;
use app\core\Application;
use app\models\ListProductModel;

$app = new Application();

$app->router->get("/", [HomeController::class, 'index']);
$app->router->get("/home", [HomeController::class, 'index']);
$app->router->get("/login", [AuthController::class, 'login']);
$app->router->get("/registration", [AuthController::class, 'registration']);
$app->router->get("/accessDenied", [AuthController::class, 'accessDenied']);
$app->router->get("/product/create", [ProductController::class, 'create']);
$app->router->get("/administration/users", [AdministrationController::class, 'users']);
$app->router->get("/api/administration/users", [AdministrationController::class, 'getAllUsers']);
$app->router->get("/logout", [AuthController::class, 'logout']);
$app->router->get("/product/delete",[ProductController::class,'delete']);
$app->router->get("/products",[ProductController::class,'index']);
$app->router->get("/api/product/rows/json",[ProductController::class,'rows']);
$app->router->get("/api/product/rows/html",[HomeController::class,'rows']);
$app->router->get("/proba",[ProductController::class,'rows']);
$app->router->get("/cart",[CartController::class,'viewCart']);
$app->router->get("/cart/order",[CartController::class,'order']);
$app->router->get("/cart/delete",[CartController::class,'deleteCart']);
$app->router->get("/admin",[AdministrationController::class,'index']);
$app->router->get("/api/soldForOneMonth",[AdministrationController::class,'soldForOneMonthAdmin']);
$app->router->get("/api/sumOfOrders",[AdministrationController::class,'sumOrders']);
$app->router->get("/api/modelsSold",[AdministrationController::class,'modelsSoldAdmin']);
$app->router->post("/loginProcess", [AuthController::class, 'loginProcess']);
$app->router->post("/createProductProcess", [ProductController::class, 'createProductProcess']);
$app->router->post("/api/cart/add",[CartController::class,'add']);
$app->router->post("/registrationProcess", [AuthController::class, 'registrationProcess']);



$app->run();