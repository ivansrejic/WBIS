<?php

use app\core\Application;

$success = Application::$app->session->getFlash(Application::$app->session->FLASH_MESSAGE_SUCCESS);

if ($success !== false) {
    echo "
                    <script>
                        $(document).ready(function (){
                            toastr.success('$success');
                        });
                    </script>
                    ";
}
$error = Application::$app->session->getFlash(Application::$app->session->FLASH_MESSAGE_ERROR);

if ($error !== false) {
    echo "
                    <script>
                        $(document).ready(function (){
                            toastr.error('$error');
                        });
                    </script>
                    ";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Soft UI Dashboard by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
    <link href="../assets/js/plugins/toastr/toastr.min.css" rel="stylesheet" />

    <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous"></script>
    <script src="../assets/js/plugins/toastr/toastr.min.js"></script>
</head>

<body class="">
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid pe-0">
                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="/">
                        Prodavnica mobilnih telefona
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav me-1 ms-auto">
                            <li class="nav-item">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-search" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" id="search-input-field" name="search" placeholder="Type here...">
                                </div>
                            </li><li class="nav-item">
                                <a class="nav-link me-2" href="/cart">
                                    <i class="fas fa-shopping-cart opacity-6 text-dark me-1"></i>
                                    Cart
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="/registration">
                                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                    Sign Up
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="/login">
                                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                    Sign In
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="/products">
                                    <i class="fa-brands fa-product-hunt"></i>
                                     My products
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>
<main class="main-content  mt-0">
    <section>
        <div class="container-fluid">
            {{ renderPartialView }}
        </div>
    </section>
</main>

<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
