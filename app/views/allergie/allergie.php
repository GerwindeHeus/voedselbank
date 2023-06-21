<?php require(APPROOT . '/views/includes/Navbar.php');?>


<h3 class="" style="margin-left: 8rem;"><?= $data['title'] ?></h3>
<h4 class="" style="margin-left: 8rem;">Naam: <?= $data['Naam'] ?></h4>
<h4 class="" style="margin-left: 8rem;">Omschrijving: <?= $data['Omschrijving'] ?></h4>




<div class="class=d-flex" style="height: 10px;">

</div>

<head>
    <meta charset=" utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jamin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<div class="container " style="margin-right: 120rem;">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Naam</th>
                        <th scope="col">Type Persoon</th>
                        <th scope="col">Gezinsrol</th>
                        <th scope="col">Allergie</th>
                        <th scope="col">Wijzig Allergie</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $data['rows'] ?>
                </tbody>

            </table>
        </div>
        <div class="col-1"></div>