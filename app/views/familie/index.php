<?php 
  //include(APPROOT . "/views/includes/head.php" );
  echo $data["title"]; 
?>
</div>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voedselbank-Maaskaantje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<div class="container text-center">
    <div class="row">
        <div class="col-12">
            <form action="#" method="GET">
                <div class="dropdown mb-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Selecteer Postcode
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php foreach ($data['postcode'] as $postcode) : ?>
                        <option value="<?php echo $postcode->id; ?>"><?php echo $postcode->Type; ?></option>
                         <?php endforeach; ?>
                    </ul>
                </div>
            </form>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Naam Gezin</th>
                        <th scope="col">Vertegenwoordiger</th>
                        <th scope="col">E-mailadres</th>
                        <th scope="col">Mobiel</th>
                        <th scope="col">Adres</th>
                        <th scope="col">Woonplaats</th>
                        <th scope="col">Klant Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $data['families'] ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-dGf7t8u6drrvhAPegZmB8S7l+/yaxjw8Jyv7HWh2B6IgEKqwLbY4uqGBwa0qkb7j"
    crossorigin="anonymous"></script>

    