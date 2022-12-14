<?php

/** @var $params \app\models\ProductModel
 */

?>
<div class="card">
    <div class="card-header pb-0 text-left">
        <h3 class="font-weight-bolder text-info text-gradient">Insert product</h3>
    </div>
    <div class="card-body">
        <form action="/createProductProcess" method="post" role="form">
            <label>Brand</label>

            <div class="mb-3">
                <select name="brand" id="brand" class="form-control">
                    <option value="Apple">Apple</option>
                    <option value = "Samsung">Samsung</option>
                    <option value = "Xaomi">Xaomi</option>
                    <option value = "LG">LG</option>

                </select>
                <?php
                if ($params !== null && $params->errors !== null)
                {
                    foreach ($params->errors as $objectNum => $item) {
                        if ($objectNum == "brand")
                        {
                            echo "<option value='brand' selected='selected'>";
                        }
                    }
                }
                ?>
            </div>
            <label>Model</label>
            <div class="mb-3">
                <input type="text" class="form-control" name="model" placeholder="Model" aria-label="Model" aria-describedby="model-addon">
                <?php
                if ($params !== null && $params->errors !== null)
                {
                    foreach ($params->errors as $objectNum => $item) {
                        if ($objectNum == "model")
                        {
                            echo "<span class='text-danger'>$item[0]</span>";
                        }
                    }
                }
                ?>
            </div>
            <label>Price</label>
            <div class="mb-3">
                <input type="text" class="form-control" name="price" placeholder="Price" aria-label="Price" aria-describedby="price-addon">
                <?php
                if ($params !== null && $params->errors !== null)
                {
                    foreach ($params->errors as $objectNum => $item) {
                        if ($objectNum == "price")
                        {
                            echo "<span class='text-danger'>$item[0]</span>";
                        }
                    }
                }
                ?>
            </div>
            <label>Description</label>
            <div class="mb-3">
                <textarea class="form-control" name="description" placeholder="Enter description" aria-label="Description" aria-describedby="description-addon"></textarea>
                <?php
                if ($params !== null && $params->errors !== null)
                {
                    foreach ($params->errors as $objectNum => $item) {
                        if ($objectNum == "description")
                        {
                            echo "<span class='text-danger'>$item[0]</span>";
                        }
                    }
                }
                ?>
            </div>
            <label>Image URL : </label>
            <div class="mb-3">
                <input type="text" class="form-control" name="image_url" placeholder="Image URL" aria-label="Image_URL" aria-describedby="image-url-addon">
                <?php
                if ($params !== null && $params->errors !== null)
                {
                    foreach ($params->errors as $objectNum => $item) {
                        if ($objectNum == "image_url")
                        {
                            echo "<span class='text-danger'>$item[0]</span>";
                        }
                    }
                }
                ?>
            </div>
            <div class="text-center">
                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Insert product</button>
            </div>
        </form>
    </div>
</div>