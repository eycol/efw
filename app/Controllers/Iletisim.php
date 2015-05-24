<?php
namespace Controllers;

use Core\Controller\Controller;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Imagine\Image\Point;
use Imagine\Image\ImageInterface;

class Iletisim extends Controller{

    public function __construct(){

    }
    public function index(){
        echo 'iletisim index';
    }

    public function deneme(){
        $baseDir = dirname(dirname(dirname(__FILE__)));
        echo $baseDir;
        $imagine = new Imagine();

        $size    = new Box(40, 40);
        $mode    = ImageInterface::THUMBNAIL_INSET;

        $imagine->open($baseDir.'/logo.jpg')->thumbnail($size, $mode)->save($baseDir.'/logo1.jpg');

    }
}