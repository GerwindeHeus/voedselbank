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
        $result = $this->klantmodel->getKlanten();
        $rows = '';
        foreach ($result as $value) {
            $rows .= "<tr>
                         <td>$value->Naam</td>
                         <td>$value->Plaats</td>
                         <td>$value->Telefoonnummer</td>
                         <td>$value->Email</td>
                         <td>$value->AantalVolwassen</td>
                         <td>$value->AantalKinderen</td>
                         <td>$value->AantaBabys</td>
                         <td>$value->Type</td>
                        <td><a href='" . URLROOT . "klant/update/$value->id'>update</a></td>
                      </tr>";
        $data = [
            'title' => "Klant", 
            'rows' => $rows
        ];
        $this->view('klant/overzicht', $data);
    }
  }

   public function update($id)
    {
        
    }
}