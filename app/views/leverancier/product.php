<h3 class="text-success"><?= $data['title'] ?></h3>
<h5 class="text-center">Naam Leverancier: <?= $data['naam'] ?></h5>
<h5 class="text-center">LeverancierNummer: <?= $data['leverancierNummer'] ?></h5>
<h5 class="text-center">LeverancierType: <?= $data['leverancierType'] ?></h5>


<div class="class=" d-flex" style="height: 50px;"">
</div>

<!-- HTML-head sectie -->
<head>
    <meta charset=" utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>

    <!-- Container voor de inhoud -->
    <div class="container text-center">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <!-- Tabel met klantgegevens -->
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Naam</th>
                            <th scope="col">Soort Allergie</th>
                            <th scope="col">Barcode</th>
                            <th scope="col">Houdbaarheidsdatum</th>
                            <th scope="col">Wijzig product</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $data['rows'] ?>
                    </tbody>
                </table>

            </div>
            <div class="col-1"></div>
            <div>
                <!-- Einde van de HTML-code -->
            </div>