<?php require APPROOT . '/views/includes/header.php'; ?>
<h1 class="text-center">Klant Details</h1>


<?php if (isset($data['family'])) : ?>
    <form method="POST" action="<?php echo URLROOT; ?>/families/update/<?php echo $data['family']->Id; ?>">
        <label for="voornaam">Voornaam:</label>
        <input type="text" name="voornaam" value="<?php echo $data['family']->Naam; ?>" required><br>

        <label for="tussenvoegsel">Tussenvoegsel:</label>
        <input type="text" name="tussenvoegsel" value="<?php echo isset($data['family']->Tussenvoegsel) ? $data['family']->Tussenvoegsel : ''; ?>"><br>

        <label for="achternaam">Achternaam:</label>
        <input type="text" name="achternaam" value="<?php echo isset($data['family']->Achternaam) ? $data['family']->Achternaam : ''; ?>" required><br>


        <label for="geboortedatum">Geboortedatum:</label>
        <input type="text" name="geboortedatum" value="<?php echo isset($data['family']->Geboortedatum) ? $data['family']->Geboortedatum : ''; ?>" required><br>

        <label for="typePersoon">Type Persoon:</label>
        <input type="text" name="typePersoon" value="<?php echo isset($data['family']->TypePerson) ? $data['family']->TypePersoon : ''; ?>" required><br>

        <label for="vertegenwoordiger">Vertegenwoordiger:</label>
        <input type="text" name="vertegenwoordiger" value="<?php echo isset($data['family']->Vertegenwoordiger) ? $data['family']->Vertegenwoordiger : ''; ?>" required><br>

        <label for="straatnaam">Straatnaam:</label>
        <input type="text" name="straatnaam" value="<?php echo isset($data['family']->Straatnaam) ? $data['family']->Straatnaam : ''; ?>" required><br>

        <label for="huisnummer">Huisnummer:</label>
        <input type="text" name="huisnummer" value="<?php echo isset($data['family']->Huisnummer) ? $data['family']->Huisnummer : ''; ?>" required><br>

        <label for="toevoeging">Toevoeging:</label>
        <input type="text" name="toevoeging" value="<?php echo isset($data['family']->Toevoeging) ? $data['family']->Toevoeging : ''; ?>" required><br>

        <label for="postcode">Postcode:</label>
        <input type="text" name="postcode" value="<?php echo isset($data['family']->Postcode) ? $data['family']->Postcode : ''; ?>" required><br>

        <label for="woonplaats">Woonplaats:</label>
        <input type="text" name="woonplaats" value="<?php echo isset($data['family']->Woonplaats) ? $data['family']->Woonplaats : ''; ?>" required><br>

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo isset($data['family']->Email) ? $data['family']->Email : ''; ?>" required><br>

        <label for="mobiel">Mobiel:</label>
        <input type="text" name="mobiel" value="<?php echo isset($data['family']->Mobiel) ? $data['family']->Mobiel : ''; ?>" required><br>

        <input type="submit" value="Update">
    </form>
<?php else: ?>
    <p>No family data found.</p>
<?php endif; ?>
