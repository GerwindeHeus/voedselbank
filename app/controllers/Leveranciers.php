<?php

class Leveranciers extends Controller
{

    //hiermee spreken we de model aan
    private $leveranciersModel;
    public function __construct()
    {
        $this->leveranciersModel = $this->model('LeveranciersModel');
    }

    //functie om alle leveranciers op te halen op de overzicht pagina
    public function index()
    {
        $result = $this->leveranciersModel->getLeverancier();
       
        $rows = '';
        foreach ($result as $value) {
            $rows .= "<tr>
                         <td>$value->bedrijfsnaam</td>
                         <td>$value->adres</td>
                         <td>$value->DatumEerstVolgendeLevering</td>
                         <td><a href='" . URLROOT . "leveranciers/contactPersoon/$value->id'><img src='" . URLROOT . "/img/persoon.png' alt='Persoon'></a></td>
                         <td><a href='" . URLROOT . "leveranciers/update/$value->id'><img src='" . URLROOT . "/img/edit.png' alt='edit'></a></td>
                         <td><a href='" . URLROOT . "leveranciers/delete/$value->id'><img src='" . URLROOT . "/img/delete.png' alt='delete'></a></td>
                      </tr>";
        }
        
        $data = [
            'title' => "Leverancier",
            'rows' => $rows,
        ];
        $this->view('leveranciers/overzicht', $data);
    }

    //functie om de contactpersoon van een leverancier op te halen op de contactpersoon pagina
    public function contactpersoon($id)
    {
        $result = $this->leveranciersModel->getContactPersoon($id);
       
        $rows = '';
        foreach ($result as $value) {
            $rows .= "<tr>
                         <td>$value->Naam</td>
                         <td>$value->Email</td>
                         <td>$value->Telefoonnummer</td>
                      </tr>";
        }
        $data = [
            'title' => "Leverancier",
            'rows' => $rows,
            
        ];
        $this->view('leveranciers/contactPersoon', $data);
    }

    //functie om een leverancier te wijzigen op de update pagina
    public function update($id = NULL){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
            $this->leveranciersModel->updateLeverancier($_POST);

            header("Location: " . URLROOT . "leveranciers/overzicht");
        }
            $row = $this->leveranciersModel->getSingleLeverancier($id);
            $data = [
                'title' => "Leverancier wijzigen",
                'row' => $row
                     
            ];
        
            $this->view('leveranciers/update', $data); 
        }

    //functie om een leverancier toe te voegen op de toevoegen pagina 
    public function toevoegen(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->leveranciersModel->addLeverancier($_POST);
            // var_dump($result);exit;
            if ($result) {
                echo "Het toevoegen is gelukt";
                header("Refresh:3; URL=" . URLROOT . "leveranciers/overzicht");
            } else {
                echo "Internal server error, het toevoegen is niet gelukt";
                header("Refresh:3; URL=" . URLROOT . "leveranciers/overzicht");
            }
        } 
        $data = [
            'title' => "Leverancier toevoegen"
        ];
        $this->view('leveranciers/toevoegen', $data);
    }

    //functie om een leverancier te verwijderen op de overzicht pagina
    public function delete($id)
    {
        if($this->leveranciersModel->deleteLeverancier($id)) {
            echo "De gegevens zijn met succes verwijdert<br>Overt 3 seconden wordt u terug gestuurd naar de overzicht pagina";
            header("Refresh:3; URL=" . URLROOT . "/leveranciers/overzicht");
        } else {
            echo "Het is niet gelukt om de gegevens te verwijderen, Probeer het nog een keer<br>Overt 3 seconden wordt u terug gestuurd naar de overzicht pagina";
            header("Refresh:3; URL=" . URLROOT . "/leveranciers/overzicht");
        }
    }

    

}