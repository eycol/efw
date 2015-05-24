<?php
error_reporting(-1);
ini_set('display_errors', 1);

require_once 'vendor/autoload.php';

$router = new \Core\Router\Router();
$router->add('/','Index');
$router->add('/eyup','Eyup');
$router->add('/iletisim/deneme','Iletisim');
$router->add('/dene',function($deger){ echo 'deneme '.$deger; });

$router->run();


