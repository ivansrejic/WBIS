<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Products</h6>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="/product/create" target="_blank" class="btn btn-sm btn-primary">Create new product</a>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>

                        </thead>
                        <tbody id="table-body">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function (){
        getRows();

        $("#search-input-field").change(function () { //change osluskuje promene
            $("#table-body").empty();
            getRows();
        });
    });

    $(document).on('click', '.delete-btn-action', function () {
        $.get($(this).data("route"), function (result) {
            //getRows();
        });
    });

    function getRows()
    {
        var data = {"search": $("#search-input-field").val()};
        $.get("/api/product/rows/json?search=", data, function(result) {
            $.each(JSON.parse(result), function(i, item) {
                $("#table-body").append(
                    "<tr>" +
                    "<td>" +
                    "<div class='d-flex px-2 py-3'>" +
                    "<div>" +
                    `<img src='${item.image_url}' class='avatar' style='height: 120px; width:120px; object-fit: contain' alt='...'>` +                    "</div>" +
                    "<div class='d-flex flex-column justify-content-center'>" +
                    "<h6 class='mb-0 text-sm'>" + item.brand + " " +  item.model + "</h6>" +
                    "<p class='text-xs text-secondary mb-0'>"+ item.description +"</p>" +
                    "</div>" +
                    "</div>" +
                    " </td>" +
                    "<td>" +
                    "</td>" +
                    "<td class='align-middle text-center text-sm'>" +
                    "<span class='badge badge-sm bg-gradient-success' style='font-weight: bold'>"+item.price+" "+ '$' +"</span>" +
                    "</td>" +
                    "<td class='align-middle'>" +
                    "<a href='javascript:;' data-route='/product/delete?id=" + item.id + "' class='text-2xl font-weight-bold text-xs delete-btn-action' data-toggle='tooltip' data-original-title='Edit user'>Delete</a>" +
                    "</td>" +
                    "</tr>"
                );
            });
        });
    }

</script>