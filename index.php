<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Load More With Ajax</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-self-center">
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Title</td>
                        </tr>
                    </thead>
                    <tbody id="tbody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.5.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function load(page) {
                $.ajax({
                    url: "conn.php",
                    type: "POST",
                    data: {
                        page: page
                    },
                    success: function(data) {
                        $("#tbody").append(data)
                    }
                })
            }
            load()
            $(document).on("click", "#btn", function() {
                $("#rw").remove();
                $(this).html("Loding....")
                var id = $(this).data("id");
                load(id);
            })

        })
    </script>
</body>

</html>