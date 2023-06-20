<?php

class Klant extends Controller
{
    private $klantmodel;

    public function __construct()
    {
        $this->klantmodel = $this->model('KlantModel');
    }


    public function index()
    {
        $results = $this->klantmodel->getKlanten();
        $rows = '';
        foreach ($results as $value) {
            $rows .= "<tr>
                         <td>$value->Naam</td>
                         <td>$value->Plaats</td>
                         <td>$value->Telefoonnummer</td>
                         <td>$value->Email</td>
                         <td>$value->AantalVolwassen</td>
                         <td>$value->AantalKinderen</td>
                         <td>$value->AantaBabys</td>
                         <td>$value->Type</td>
                        <td><a href='" . URLROOT . "klant/update/$value->id'>edit</a></td>
                        <td><a href='" . URLROOT . "klant/delete/$value->id'>delete</a></td>
                        <td><a href='" . URLROOT . "klant/create/'>create</a></td>
                      </tr>";
        }     
        $data = [
            'title' => "Klant", 
            'rows' => $rows
        ];
        $this->view('klant/overzicht', $data);
    
    
  }
public function update($id = NULL){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $this->klantmodel->updateKlant($_POST);

            header(" Location: " . URLROOT . "klant/index");
        
        }else{
            $klant = $this->klantmodel->getSingleKlant($id);
           
            $data = [
                'title' => 'Update een klant',
                'row' => $klant
            ];
            $this->view("klant/update", $data);
        }
    }



     public function delete($id)
    {
        if($this->klantmodel->deleteKlant($id)) {
            echo "Het delete is gelukt";
            header("Refresh:3; URL=" . URLROOT . "/klant/index");
        } else {
            echo "Internal server error. Raadpleeg de admin";
            header("Refresh:3; URL=" . URLROOT . "/klant/index");
        }
    }

    public function addContact(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $result = $this->klantmodel->addKlant($_POST);
        if($result){
            echo "het toevoegen is gelukt";
            header('location: ' . URLROOT . 'klant/overzicht');
        }else{
            echo "het toevoegen is niet gelukt";
            header('location: ' . URLROOT . 'klant/overzicht');
        }
    }
        else{
           $data = [
            'title' => "Klant toevoegen",
            
        ];
        $this->view('klant/create', $data); 
        }
          
    }

 
    // Other functions and code within the controller

   

    


}