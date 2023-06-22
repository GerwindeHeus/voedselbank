<?php require(APPROOT . '/views/includes/Navbar.php');?>

<h2><?= $data['titel'] ?></h2>


<div class="row-form" style="margin-left: 58rem;">

    <form action="" method="post">
        <select name="Allergie" id="">
            <option value="" disabled selected hidden>Selecteer Allergie</option>
            <?php echo $data['allergieOptions']; ?>
        </select>
        <button type="submit">Toon Gezinnen</button>
    </form>
</div>


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
                        <th scope="col">Omschrijving</th>
                        <th scope="col">Volwassenen</th>
                        <th scope="col">Kinderen</th>
                        <th scope="col">Babys</th>
                        <th scope="col">Vertegenwoordiger</th>
                        <th scope="col">Allergie Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $data['rows'] ?>
                </tbody>

            </table>
        </div>
        <div class=" col-1"></div>