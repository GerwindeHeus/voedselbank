<?php

class Leverancier extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        $data = [
            'title' => "Overzicht Leveranciers"
        ];
        $this->view('leverancier/overzicht', $data);
    }
}