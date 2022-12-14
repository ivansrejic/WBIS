<div class="row p-3 mt-8 " id="products-panel">
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
        var data = { "product_id" : productId}
        $.post(route, data , function( result ) {
            if(result.success)
            {
                toastr.success(result.message);
            }
            if(!result.success)
            {
                toastr.error(result.message);
            }
        } )
    })
</script>


