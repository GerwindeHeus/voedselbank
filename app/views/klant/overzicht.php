<h3 class="text-center"><?= $data['title'] ?></h3>
<div class="class=" d-flex" style="height: 50px;"">
</div>
<head>
    <meta charset=" utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Klant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <div class="container text-center">
        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">(Gezins-)naam</th>
                            <th scope="col">Adres</th>
                            <th scope="col">Telefoonr</th>
                            <th scope="col">Email</th>
                            <th scope="col">Volwassenen(> 18jaar) </th>
                            <th scope="col">Kinderen(>2 jaar)</th>
                            <th scope="col">Babys(<=2 jaar)</th>
                            <th scope="col">Wensen</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $data['rows'] ?>
                    </tbody>

                </table>
            </div>
            <div class="col-1"></div>
            <div>

            </div>