<?php require(APPROOT . '/views/includes/Navbar.php');?>
<h3 class="text-center"><?= $data['title']; ?></h3>
<form style="margin-left: 53rem;" class="form-group" action="<?= URLROOT; ?>leverancier/update" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    <input class="form-control" type="text" name="bedrijfsnaam" required
                        value="<?= $data['row']->bedrijfsnaam; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="form-control" type="text" name="adres" required value="<?= $data['row']->adres; ?>">
                </td>
            </tr>

            <tr>
                <td>
                    <input class="form-control" type="text" required name="DatumEerstVolgendeLevering"
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