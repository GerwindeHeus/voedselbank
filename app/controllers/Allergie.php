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
        $result = $this->allergiesModel->getPersoon($id);
        $records = $this->allergiesModel->getAllergie($id);

        $rows = '';
        foreach ($records as $value) {
            $rows .= "<tr>
                            <td>$value->Volledignaam</td>
                            <td>$value->TypePersoon</td>
                            <td>$value->IsVertegenwoordiger</td>
                            <td>$value->Naam</td>
                            <td><a href='" . URLROOT . "allergie/update/'><img src='" . URLROOT . "/img/add.png' alt='Nieuwe Levering'></a></td>
                            </tr>";
            }
        
        $data = [
            'title' => "Allergieen in het gezin",
            'rows' => $rows,
            'Naam' => $result[$id]->Naam,
            'Omschrijving' => $result[$id]->Omschrijving
            
        ];
        $this->view('allergie/allergie', $data);
    }

    public function update(){
        $data = [
            'title' => "Allergieen in het gezin"
            
        ];
        $this->view('allergie/update', $data);
    }

}

?>