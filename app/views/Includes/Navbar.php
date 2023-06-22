<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Allergie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Voedselpakket</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Klant</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= URLROOT; ?>leveranciers/overzicht">Leverancier</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= URLROOT; ?>Allergie/overzicht">Dag 3 Gerwin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= URLROOT; ?>leverancier/overzicht">Dag 3 Henk</a>
            </li>
        </ul>
    </div>
</nav>