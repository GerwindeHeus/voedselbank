<?php 
  //include(APPROOT . "/views/includes/head.php" );
  echo $data["title"]; 
?>
</div>
<head>
    <meta charset=" utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voedselbank-Maaskaantje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <div class="container text-center">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Naam</th>
                            <th scope="col">Allergie</th>
                            <th scope="col">delete</th>
                            <th scope="col">edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $data['families'] ?>
                    </tbody>
                </table>
            </div>
            <div class="col-1"></div>
            <div>
            </div>  

            <button style="" type="button" class="btn btn-dark "><a
                        href="<?= URLROOT; ?>/familie/create">Create</a></button>