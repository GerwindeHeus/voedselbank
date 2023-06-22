<?php

class Allergie extends Controller
{

    //hiermee spreken we de model aan
    private $allergiesModel;
    public function __construct()
    {
        $this->allergiesModel = $this->model('AllergiesModel');
    }

    //functie om alle leveranciers op te halen op de overzicht pagina
    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Filter de post array
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Check of de post array niet leeg is
            if (empty($post)) {
                header('location: ' . URLROOT . 'allergie/overzicht');
            }

            // Haal de gegevens van het gezin op
            $allergieen = $this->allergiesModel->getAllergieById($post['Allergie']);
           
            // Check of er data is gevonden voor het allergie
            if (empty($allergieen)) {
                // Zet de benodinge data in een array
                $data = [
                    'titel' => 'Overzicht gezinnen met Allergieën',
                    'rows' => '<tr><td id="error" colspan="7">Er zijn geen gezinnen bekent die de geselecteerde allergie hebben</td></tr>'
                ];
                // Laad de view
                $this->view('allergie/overzicht', $data);
                exit;
            } else {
                // Maak een row aan met de gegevens van het gezin
                $rows = '';
                foreach ($allergieen as $value) {
                    $rows .= "<tr>
                         <td>$value->GezinNaam</td>
                         <td>$value->Omschrijving</td>
                         <td>$value->AantalVolwassenen</td>
                         <td>$value->AantalKinderen</td>
                         <td>$value->AantalBabys</td>
                         <td>$value->Volledignaam</td>
                         <td><a href='" . URLROOT . "allergie/allergie/$value->GezinsId'><img src='" . URLROOT . "/img/details.png' alt='details'></a></td>
                      </tr>";
                };
            }
        } else {
            // Haal alle gezinnen en allergieen op
            $allergieen = $this->allergiesModel->getPersoon();
            
            // Check of er data is gevonden voor het gezin en de allergieen
            $rows = '';
            foreach ($allergieen as $value) {
                $rows .= "<tr>
                         <td>$value->Naam</td>
                         <td>$value->Omschrijving</td>
                         <td>$value->AantalVolwassenen</td>
                         <td>$value->AantalKinderen</td>
                         <td>$value->AantalBabys</td>
                         <td>$value->Volledignaam</td>
                         <td><a href='" . URLROOT . "allergie/allergie/$value->id'><img src='" . URLROOT . "/img/details.png' alt='details'></a></td>
                      </tr>";
            };
        }
        // Haal alle allergieen op
        $allergie = $this->allergiesModel->getAllergieAll();
        // Maak een optie aan voor elke allergie
        $allergieOptions = '';
        foreach ($allergie as $value) {
            $allergieOptions .= "<option value='$value->id'>$value->Naam</option>";
            
        }
       

        // Maak een array aan met alle benodigde data voor de view
        $data = [
            'titel' => 'Overzicht gezinnen met Allergieën',
            'rows' => $rows,
            'allergieOptions' => $allergieOptions
        ];

        // Laad de view
        $this->view('allergie/overzicht', $data);
    }
        

        

    public function allergie($id)
    {
        $result = $this->allergiesModel->getPersoon1($id);
        $records = $this->allergiesModel->getAllergie($id);

        $rows = '';
        foreach ($records as $value) {
            $rows .= "<tr>
                            <td>$value->Volledignaam</td>
                            <td>$value->TypePersoon</td>
                            <td>$value->IsVertegenwoordiger</td>
                            <td>$value->Naam</td>
                            <td><a href='" . URLROOT . "allergie/update/$value->id'><img src='" . URLROOT . "/img/add.png' alt='Nieuwe Levering'></a></td>
                            </tr>";
            }
        
        $data = [
            'title' => "Allergieen in het gezin",
            'rows' => $rows,
            'Naam' => $result[0]->Naam,
            'Omschrijving' => $result[0]->Omschrijving
            
        ];
        $this->view('allergie/allergie', $data);
    }

    public function update($id = NULL){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $persoonId = $_POST['persoonId'];
            $id = $_POST['id'];


            $allergie = $this->allergiesModel->updateAllergie($id, $persoonId);

            header('location: ' . URLROOT . '/allergie/allergie/' . $id . '');

            if ($allergie) {
                $data = [
                    'updateStatus' => "De allergie voor deze familie is succesvol bijgewerkt!"
                ];
                $this->view('allergie/allergie', $data);
                header('Refresh:3; url=' . URLROOT . '/allergie/allergie');
            } else {
                $data = [
                    'updateStatus' => "Er is iets fout gegaan bij het bijwerken van de allergie voor deze familie!"
                ];
                $this->view('allergie/allergie/', $data);
            }
        } else {

            $allergies = $this->allergiesModel->getAllergieAll();
            
        $data = [
            'title' => "Allergieen in het gezin",
            'allergie' => $allergies,
            'id' => $id,
            
        ];
        $this->view('allergie/update', $data);
    }
    }

}

?>