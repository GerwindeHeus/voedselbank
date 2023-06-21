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
                         <td>$value->Code</td>
                         <td>$value->Naam</td>
                         <td>$value->Omschrijving</td>
                         <td>$value->AantalVolwassenen</td>
                         <td>$value->AantalKinderen</td>
                         <td>$value->AantalBabys</td>
                         <td>$value->Volledignaam</td>
                         <td><a href='" . URLROOT . "leverancier/delete/'><img src='" . URLROOT . "/img/details.png' alt='details'></a></td>
                      </tr>";
        }
        
        $data = [
            'title' => "Overzicht gezinnen met allergieën",
            'rows' => $rows,
            
        ];
        $this->view('allergie/overzicht', $data);
    }

}

?>