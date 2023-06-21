<?php

class Leverancier extends Controller
{


    private $leverancierModel;

    public function __construct()
    {
        $this->leverancierModel = $this->model('LeverancierModel');
    }

 // Overzicht-functie
public function overzicht()
{
    $results = $this->leverancierModel->getLeveranciers();

    $rows = '';
    foreach ($results as $value) {
        // Genereer HTML-rijen voor elke klant
        $rows .= "<tr>
             <td>$value->Naam</td>
             <td>$value->ContactPersoon</td>
             <td>$value->Email</td>
             <td>$value->Mobiel</td>
             <td>$value->LeverancierNummer</td>
             <td>$value->LeverancierType</td>             
             <td><a href='" . URLROOT . "leverancier/product/" . $value->Id . "'><img src='" . URLROOT . "/img/product.svg' alt='update'></a>
          </td>
          </tr>";
    }

    $data = [
        'title' => "Overzicht Leveranciers",
        'rows' => $rows
    ];
    $this->view('leverancier/overzicht', $data);
}

public function product($Id)
{
    $result = $this->leverancierModel->getLeverancierId($Id);
    $records = $this->leverancierModel->getProduct($Id);
   
    $rows = '';
    foreach ($records as $value) {
        $rows .= "<tr>

                     <td>$value->Naam</td>
                     <td>$value->SoortAllergie</td>
                     <td>$value->Barcode</td>
                     <td>$value->Houdbaarheidsdatum</td>
                     <td><a href='" . URLROOT . "leverancier/edit/" .  "'><img src='" . URLROOT . "/img/pen.svg' alt='update'></a>
                  </tr>";
    }
    $data = [
    'title' => "Overzicht Producten",
    'rows' => $rows,
    'naam' => $result[0]->Naam,
    'leverancierNummer' => $result[0]->LeverancierNummer,
    'leverancierType' => $result[0]->LeverancierType
];
$this->view('leverancier/product', $data);
}

public function edit(){
    $data = [
        'title' => "Wijzig Product"
    ];
    $this->view('leverancier/edit', $data);
}




}