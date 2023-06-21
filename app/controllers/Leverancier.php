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
                     <td><a href='" . URLROOT . "leverancier/product/$value->Id'><img src='" . URLROOT . "/img/product.svg' alt='update'></a></td>
                   </tr>";
    }

    $data = [
        'title' => "Overzicht Leveranciers",
        'rows' => $rows
    ];
    $this->view('leverancier/overzicht', $data);
}

// Product-functie
public function product($Id)
{
    $result = $this->leverancierModel->getProduct($Id);
   
    $rows = '';
    foreach ($result as $value) {
        $rows .= "<tr>
                     <td>$value->Naam</td>
                     <td>$value->SoortAllergie</td>
                     <td>$value->Barcode</td>
                     <td>$value->Houdbaarheidsdatum</td>
                  </tr>";
    }
    $data = [
        'title' => "Overzicht Producten",
        'rows' => $rows,
        
    ];
    $this->view('leverancier/product', $data);
}

}