<?php
namespace Controllers;
use Core\Controller\Controller;

class Index extends Controller{

    public function __construct(){

        echo 'ilk controller calisti ';
    }

    public function dene(){
        echo 'index yuklendi.';
    }

}