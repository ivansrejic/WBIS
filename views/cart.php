<?php
    /** @var $params  \app\models\CartModel
     */
?>

<div class="row p-3 mt-8">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-md-6">
                        <h6>My cart</h6>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="/cart/order" target="_blank" class="btn btn-sm btn-primary">Order</a>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>

                        </thead>
                        <tbody id="table-body">
                        <?php
                        if($params != null && $params->cart_items != null)
                        {
                            foreach($params->cart_items as $item)
                            {
                                echo"<tr>";
                                echo"<td>";
                                echo"<div class='d-flex px-2 py-3'>" ;
                                echo"<div>" ;
                                echo "<img src='$item->image_url' class='card-img-top' style='max-height: 180px' alt='...'>";
                                echo"</div>" ;
                                echo"<div>" ;
                                echo"<p style='font-weight: bold ; color:darkslategrey'> '$item->brand' </p>" ;
                                echo"<p style='font-weight: bold; color:purple'> $item->model  </p>" ;
                                echo"<p > $item->description  </p>" ;
                                echo"</div>" ;
                                echo"</div>" ;
                                echo" </td>" ;
                                echo"<td>" ;
                                echo"</td>" ;
                                echo"<td class='align-middle text-center text-sm'>" ;
                                echo"<span class='badge bg-gradient-success' style='font-weight: bold;'> $item->price  '$' </span>" ;
                                echo"</td>" ;
                                echo"<td>" ;
                                echo"<span class='m-4 text-bg'>$item->quantity</span>";
                                echo"</td>" ;
//                                echo"<td>";
//                                echo"<button class='remove-quantity-from-cart btn btn-sm' style='background: indianred; color:black' data-id='$item->product_id' data-route='/delete'>Remove</button>";
//                                echo"</td>";
                                echo"</tr>";
                            }

                        }

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
