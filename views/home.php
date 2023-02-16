<div class="row mt-8 justify-content-center" id="products-panel" style="gap:10px">
</div>
<script>
    $(document).ready(function (){
        $.get("/api/product/rows/html",function(result){
           $("#products-panel").append(result);
        });
    });

    $(document).on('click','.btn-add-to-cart', function(){
        var productId = $(this).data("id");
        var route = $(this).data("route");
        var data = { "id" : productId}
        $.post(route, data , function( result ) {
            var jsonResult = JSON.parse(result);
            if (jsonResult.success === true)
            {
                toastr.success(jsonResult.message);
            }

            if (jsonResult.success === false)
            {
                toastr.error(jsonResult.message);
            }
        });
    });
</script>


