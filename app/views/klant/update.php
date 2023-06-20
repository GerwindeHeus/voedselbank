<form action="<?= URLROOT; ?>klant/update" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    Naam<input type="text" name="Naam" value="<?= $data['row']->Naam; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Plaats <input type="text" name="Plaats" value="<?= $data['row']->Plaats; ?>">
                </td>
            </tr>

            <tr>
                <td>
                    Telefoonnummer <input type="number" name="Telefoonnummer"
                        value="<?= $data['row']->Telefoonnummer; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Email <input type="text" name="Email" value="<?= $data['row']->Email; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    AantalVolwassen <input type="number" name="AantalVolwassen"
                        value="<?= $data['row']->AantalVolwassen; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    AantalKinderen <input type="number" name="AantalKinderen"
                        value="<?= $data['row']->AantalKinderen; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    AantalBabys <input type="number" name="AantaBabys" value="<?= $data['row']->AantaBabys; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Type <input type="text" name="Type" value="<?= $data['row']->Type; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="" value="<?= $data['row']->Id; ?>">
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