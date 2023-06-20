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
    foreach ($families as $value){
      $rows .= "<tr>
                  <td>$value->Naam</td>
                  <td>$value->Allergie</td>
                  <td><a href='" . URLROOT . "/families/delete/$value->id'>delete</a></td>
                  <td><a href='" . URLROOT . "/families/update/$value->id'>update</a></td>
                </tr>";
    }


    $data = [
      'title' => '<h1>Families</h1>',
      'families' => $rows
    ];
    $this->view('familie/index', $data);
  }

  public function delete($Id) {
    $this->familieModel->deleteFamilie($Id);

    $data =[
      'deleteStatus' => "De allergie is succesvol verwijderd!"
    ];
    $this->view("familie/delete", $data);
    header("Refresh:3; url=" . URLROOT . "/familie/index");
  }

  public function create() {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the create form submission
    $type = $_POST['type'];
    
    $success = $this->allergieModel->createAllergie($type);
    
    if ($success) {
      // Create successful
      $data = [
        'createStatus' => "Allergie '$type' is succesvol aangemaakt!"
      ];
      $this->view("allergie/create", $data);
      header("Refresh:3; url=" . URLROOT . "/allergie/index");
    } else {
      // Create failed
      $data = [
        'createStatus' => "Er is een fout opgetreden bij het aanmaken van de allergie."
      ];
      $this->view("allergie/create", $data);
    }
  } else {
    // Display the create form
    $data = [
      'title' => 'Create Allergie'
    ];
    $this->view('familie/create', $data);
  }
}

  public function update($id) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Process the update form submission
      $allergieId = $_POST['allergieId'];
      $success = $this->familieModel->updateAllergieForFamilie($id, $allergieId);

      if ($success) {
        // Update successful
        $data = [
          'updateStatus' => "De allergie voor deze familie  is succesvol bijgewerkt!"
        ];
        $this->view("familie/update", $data);
        header("Refresh:3; url=" . URLROOT . "/familie/index");
      } else {
        // Update failed
        $data = [
          'updateStatus' => "Er is een fout opgetreden bij het bijwerken van de allergie voor familie met ID $id."
        ];
        $this->view("familie/update", $data);
      }
    } else {
      // Display the update form
      $family = $this->familieModel->getFamilyById($id);

      $allergies = $this->familieModel->getAllergies();

      $data = [
        'title' => '<h1>Update Familie Allergie</h1>',
        'family' => $family,
        'allergies' => $allergies
      ];
      $this->view('familie/update', $data);
    }
  }
}
?>