<?php
class Families extends Controller {
  // Properties, field
  private $familieModel;

  // Dit is de constructor
  public function __construct() {
    $this->familieModel = $this->model('Familie');
  }

public function index() {
  $families = $this->familieModel->getFamilies();

  $rows = '';
  foreach ($families as $value) {
    $id = isset($value->id) ? $value->id : '';
    $rows .= "<tr>
                <td>$value->Naam</td>
                <td>$value->Volledigenaam</td>
                <td>$value->Email</td>
                <td>$value->Mobiel</td>
                <td>$value->Adres</td>
                <td>$value->Woonplaats</td>               
               <td><a href='" . URLROOT . "/families/update/$value->Id'>update</a></td>
              </tr>";
  }

  $data = [
    'title' => '<h1>Overzicht klanten</h1>',
    'families' => $rows
  ];
  $this->view('familie/index', $data);
}




public function update($id)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $voornaam = $_POST['voornaam'];
         $tussenvoegsel = $_POST['tussenvoegsel'];
         $achternaam = $_POST['achternaam'];
         $typePersoon = $_POST['typePersoon'];
         $geboortedatum = $_POST['geboortedatum'];
         $straatnaam = $_POST['straatnaam'];
         $vertegenwoordiger = $_POST['vertegenwoordiger'];
         $toevoeging = $_POST['toevoeging'];
         $huisnummer = $_POST['huisnummer'];
         $woonplaats = $_POST['woonplaats'];
         $postcode = $_POST['postcode'];
         $mobiel = $_POST['mobiel'];
         $email = $_POST['email'];

        $updatedData = [
            'id' => $id,
            'voornaam' => $voornaam,
            'tussenvoegsel' => $tussenvoegsel,
            'achternaam' => $achternaam,
            'geboortedatum' => $geboortedatum,
            'typePersoon' => $typePersoon,
            'vertegenwoordiger' => $vertegenwoordiger,
            'straatnaam' => $straatnaam,
            'huisnummer' => $huisnummer,
            'toevoeging' => $toevoeging,
            'postcode' => $postcode,
            'woonplaats' => $woonplaats,
            'email' => $email,
            'mobiel' => $mobiel
        ];
        $this->familieModel->updateFamily($updatedData);

        // Redirect to the index or success page
        header("Location: " . URLROOT . "/families/index");
        exit;
    } else {

$family = $this->familieModel->getPersoonById($id);
var_dump($family);

if ($family !== null) {
    // Prepare the data to be passed to the view
    $data = [
        'title' => 'Update Family',
        'family' => $family
    ];
} else {
    // If family data is not found, you can handle the error or show an appropriate message
    $data = [
        'title' => 'Update Family',
        'updateStatus' => 'No family data found.'
    ];
}

// Load the view
$this->view('familie/update', $data);

}
}

}
?>