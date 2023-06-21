<h3 class="text-success"><?= $data['title'] ?></h3>

<div class="class=" d-flex" style="height: 50px;"">
</div>

<!-- HTML-head sectie -->
<head>
    <meta charset=" utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Leverancier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    </select>
    <!-- Container voor de inhoud -->
    <div class="dropdown text-center">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Selecteer LeverancierType
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Bedrijf</a></li>
            <li><a class="dropdown-item" href="#">Instelling</a></li>
            <li><a class="dropdown-item" href="#">Overheid</a></li>
            <li><a class="dropdown-item" href="#">Particulier</a></li>
            <li><a class="dropdown-item" href="#">Donor</a></li>
        </ul>
        <button type="button" class="btn btn-secondary">Toon Leveranciers</button>
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <!-- Tabel met klantgegevens -->
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Naam</th>
                            <th scope="col">ContactPersoon</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobiel</th>
                            <th scope="col">LeverancierNummer</th>
                            <th scope="col">LeverancierType</th>
                            <th scope="col">Product Details</th>
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