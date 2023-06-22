<?php
class Landingpages extends Controller {

  public function index() {
    $data = [
      'title' => "Homepage voedselbank maaskantje"
    ];
    $this->view('landingpages/index', $data);
  }
  public function add($number1, $number2)
    {
        $sum = $number1 + $number2;
        return $sum;
    }
}