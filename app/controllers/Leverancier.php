<?php

class Leverancier extends Controller
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
                         <td><a href='" . URLROOT . "leverancier/contactPersoon/$value->id'>Contactpersoon</a></td>
                         <td><a href='" . URLROOT . "leverancier/update/$value->id'>update</a></td>
                         <td><a href='" . URLROOT . "leverancier/delete/$value->id'>delete</a></td>
                      </tr>";
        }
        
        $data = [
            'title' => "Leverancier",
            'rows' => $rows,
        ];
        $this->view('leverancier/overzicht', $data);
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
        $this->view('leverancier/contactPersoon', $data);
    }

    //functie om een leverancier te wijzigen op de update pagina
    public function update($id = NULL){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
            $this->leveranciersModel->updateLeverancier($_POST);

            header("Location: " . URLROOT . "leverancier/overzicht");
        }
            $row = $this->leveranciersModel->getSingleLeverancier($id);
            $data = [
                'title' => "Leverancier wijzigen",
                'row' => $row
                     
            ];
        
            $this->view('leverancier/update', $data); 
        }

    //functie om een leverancier toe te voegen op de toevoegen pagina 
    public function toevoegen(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->leveranciersModel->addLeverancier($_POST);
            // var_dump($result);exit;
            if ($result) {
                echo "Het toevoegen is gelukt";
                header("Refresh:3; URL=" . URLROOT . "leverancier/overzicht");
            } else {
                echo "Internal server error, het toevoegen is niet gelukt";
                header("Refresh:3; URL=" . URLROOT . "leverancier/overzicht");
            }
        } 
        $data = [
            'title' => "Leverancier toevoegen"
        ];
        $this->view('leverancier/toevoegen', $data);
    }

    //functie om een leverancier te verwijderen op de overzicht pagina
    public function delete($id)
    {
        if($this->leveranciersModel->deleteLeverancier($id)) {
            echo "Het deleten is gelukt";
            header("Refresh:3; URL=" . URLROOT . "/leverancier/overzicht");
        } else {
            echo "Internal server error. Raadpleeg de admin";
            header("Refresh:3; URL=" . URLROOT . "/leverancier/overzicht");
        }
    }

    

}