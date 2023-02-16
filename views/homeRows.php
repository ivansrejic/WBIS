<?php

/** @var $params ProductModel
 */

use app\models\ProductModel;

?>
    <?php
    if($params != null && $params->products != null)
    {
        foreach($params->products as $product)
        {
            echo "<div class='col-md-3 border-bottom'>";
            echo "<div class='card' style='height: 100%;'>";
            echo "<img src='$product->image_url' class='card-img-top' style='max-height: 180px; object-fit: contain' alt='...'>";
            echo "<h5 class='card-title'>$product->brand</h5>";
            echo "<p class='card-text'>$product->model</p>";
            echo "<p class='card-text'>$product->description</p>";
            echo "<p class='card-text badge badge-sm bg-gradient-success' style='font-weight: bold; font-size:18px''>$product->price $</p>";
            echo "<a href='javascript:;' class='m-lg-3 p-2 m-0 btn btn-add-to-cart bg-gradient-dark' data-id='$product->id' data-route='/api/cart/add'>Add to cart</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }
    ?>

