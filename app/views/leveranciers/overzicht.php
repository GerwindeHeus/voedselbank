<?php require(APPROOT . '/views/includes/Navbar.php');?>


<h3 class="text-center"><?= $data['title'] ?></h3>


<div class="class=d-flex" style="height: 50px;"">

</div>
<head>
    <meta charset=" utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jamin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <div class="container ">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Bedrijfsnaam</th>
                            <th scope="col">Adres</th>
                            <th scope="col">Datum Eerst volgende levering</th>
                            <th scope="col">Contactpersoon</th>
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

                <button class="button1" style="margin-left:35rem; text-decoration: none; border: none;" type="button"
                    class="btn btn-dark "><a href="<?= URLROOT; ?>leveranciers/toevoegen">Toevoegen</a></button>


            </div>