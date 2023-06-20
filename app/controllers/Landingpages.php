<?php

class Landingpages extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        $data = [
            'title' => "Voedselbank Maaskantje"
        ];
        $this->view('landingpages/index', $data);
    }

     
    public function add($number1, $number2)
    {
        $sum = $number1 + $number2;
        return $sum;
    }

   
}