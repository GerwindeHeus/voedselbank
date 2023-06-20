<?php
class HomePages extends Controller {

  public function index() {
    $data = [
      'title' => "Welcome to the HomePage"
    ];
    $this->view('homepages/index', $data);
  }
  public function add($number1, $number2)
    {
        $sum = $number1 + $number2;
        return $sum;
    }
}