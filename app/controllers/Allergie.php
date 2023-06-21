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
        $result = $this->allergiesModel->getPersoon();
        
       
        $rows = '';
        foreach ($result as $value) {
            $rows .= "<tr>
                         <td>$value->Naam</td>
                         <td>$value->Omschrijving</td>
                         <td>$value->AantalVolwassenen</td>
                         <td>$value->AantalKinderen</td>
                         <td>$value->AantalBabys</td>
                         <td>$value->Volledignaam</td>
                         <td><a href='" . URLROOT . "allergie/allergie/$value->id'><img src='" . URLROOT . "/img/details.png' alt='details'></a></td>
                      </tr>";
        }
        
        $data = [
            'title' => "Overzicht gezinnen met allergieën",
            'rows' => $rows,
            
        ];
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

            $allergieId = $_POST['allergieId'];
            $id = $_POST['id'];


            $allergie = $this->allergiesModel->updateAllergie($id, $allergieId);

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