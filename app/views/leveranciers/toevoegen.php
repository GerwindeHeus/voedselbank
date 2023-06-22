<h3><?= $data['title'] ?></h3>

<form action="<?= URLROOT; ?>leveranciers/toevoegen" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    Naam:
                </td>
                <td>
                    <input type="text" name="Naam" required>
                </td>
            </tr>
            <tr>
                <td>
                    E-mailadres:
                </td>
                <td>
                    <input type="text" name="Email" required>
                </td>
            </tr>
            <tr>
                <td>
                    Telefoonnummer:
                </td>
                <td>
                    <input type="text" name="telefoonnummer" required>
                </td>
            </tr>
            <tr>
                <td>
                    Bedrijfsnaam:
                </td>
                <td>
                    <input type="text" name="bedrijfsnaam" required>
                </td>
            </tr>
            <tr>
                <td>
                    Adres:
                </td>
                <td>
                    <input type="text" name="adres" required>
                </td>
            </tr>
            <tr>
                <td>
                    Datum Eerst Volgende Levering:
                </td>
                <td>
                    <input type="date" name="DatumEerstVolgendeLevering" required>
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