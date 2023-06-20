<?php

class Leverancier extends Controller
{

    private $leveranciersModel;
    public function __construct()
    {
        $this->leveranciersModel = $this->model('LeveranciersModel');
    }

    public function index()
    {
        $result = $this->leveranciersModel->getLeverancier();
       
        $rows = '';
        foreach ($result as $value) {
            $rows .= "<tr>
                         <td>$value->bedrijfsnaam</td>
                         <td>$value->adres</td>
                         <td>$value->DatumEerstVolgendeLevering</td>
                         
                         <td><a href='" . URLROOT . "bestelling/update/'>Contactpersoon</a></td>
                         <td><a href='" . URLROOT . "leverancier/update/$value->id'>update</a></td>
                         <td><a href='" . URLROOT . "bestelling/delete/'>delete</a></td>
                      </tr>";
        }
        
        $data = [
            'title' => "Leverancier",
            'rows' => $rows,
        ];
        $this->view('leverancier/overzicht', $data);
    }

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

}