<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Users</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>

                        </tr>
                        </thead>
                        <tbody id="users">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function (){
        $.get("/api/administration/users", function(result) {
            $.each(JSON.parse(result), function(i, item) {
                $("#users").append(
                    "<tr>" +
                    "<td>" +
                    "<div class='d-flex px-2 py-1'>" +
                    "<div>" +
                    "<img src='../assets/img/team-2.jpg' class='avatar avatar-sm me-3' alt='user1'>" +
                    "</div>" +
                    "<div class='d-flex flex-column justify-content-center'>" +
                    "<p class='mb-0 text-sm'>"+ item.email +"</p>" +
                    "</div>" +
                    "</div>" +
                    " </td>" +
                    "<td class='align-middle text-center text-sm'>" +
                    "</td>" +
                    "<td class='align-middle'>" +
                    "</td>" +
                    "</tr>"
                );
            });
        });
    });
</script>