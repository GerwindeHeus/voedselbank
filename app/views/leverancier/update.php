<?php require(APPROOT . '/views/includes/Navbar.php');?>
<h3 class="text-center"><?= $data['title']; ?></h3>
<form class="form-group" action="<?= URLROOT; ?>leverancier/update" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    <input class="form-control" type="text" name="bedrijfsnaam"
                        value="<?= $data['row']->bedrijfsnaam; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="form-control" type="text" name="adres" value="<?= $data['row']->adres; ?>">
                </td>
            </tr>

            <tr>
                <td>
                    <input class="form-control" type="text" name="DatumEerstVolgendeLevering"
                        value="<?= $data['row']->DatumEerstVolgendeLevering; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="id" value="<?= $data['row']->id; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Verstuur">
                </td>
            </tr>
        </tbody>
    </table>
</form>

<?php
    var_dump($data['row']);
?>