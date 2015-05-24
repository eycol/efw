<?php
namespace Core\Router;

class Router{

    private $ulist = [];
    private $mlist = [];
    protected $class = '/';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        $uri = filter_var(trim($_GET['_uri'],'/'), FILTER_SANITIZE_URL);
        if(isset($uri) && $uri !== '' && $uri !== '/'){
            $uri = explode('/',$uri);
        }else{
            $uri = null;
        }
        if(is_array($uri) && count($uri) > 0){
            $this->class = array_shift($uri);

            if(count($uri) > 0){
                $this->method = array_shift($uri);
            }

            if(count($uri) > 0){
                $this->params = $uri;
            }
        }
    }


    /**
     * @param type $uri
     */
    public function add($u,$m=null){
        $this->ulist[] = ($u == '/')? $u : trim($u,'/');
        if($m !== null){
            $this->mlist[] = $m;
        }
    }

    public function run(){
        $match = 0;
        if(is_array($this->ulist) && count($this->ulist) > 0){
            foreach ($this->ulist as $k=>$v) {
                echo $v.' ' .$this->class. '<br>';
                if(preg_match("#^$v$#",$this->class)){
                    if(is_string($this->mlist[$k])){
                        $controller = 'Controllers\\'.$this->mlist[$k];
                        if(\Core\Loader\Loader::load($controller)){

                            $obj = new $controller();

                            switch(count($this->params)){
                                case 0:
                                    $obj->{$this->method}();
                                    break;
                                case 1:
                                    $obj->{$this->method}($this->params[0]);
                                    break;
                                case 2:
                                    $obj->{$this->method}($this->params[0],$this->params[1]);
                                    break;
                                case 3:
                                    $obj->{$this->method}($this->params[0],$this->params[1],$this->params[2]);
                                    break;
                                case 4:
                                    $obj->{$this->method}($this->params[0],$this->params[1],$this->params[2],$this->params[3]);
                                    break;
                                case 5:
                                    $obj->{$this->method}($this->params[0],$this->params[1],$this->params[2],$this->params[3],$this->params[4]);
                                    break;
                                default:
                                    $obj->{$this->method}($this->params);
                                    break;
                            }
                        }else{
                            echo '404-Sayfa bulunamadi';
                        }
                    }else{
                        call_user_func($this->mlist[$k]);
                    }

                    $match++;
                }elseif(preg_match("#^$v$#",$this->class.'/'.$this->method)){
                    if(is_string($this->mlist[$k])){
                        $controller = 'Controllers\\'.$this->mlist[$k];
                        if(\Core\Loader\Loader::load($controller)){

                            $obj = new $controller();

                            switch(count($this->params)){
                                case 0:
                                    $obj->{$this->method}();
                                    break;
                                case 1:
                                    $obj->{$this->method}($this->params[0]);
                                    break;
                                case 2:
                                    $obj->{$this->method}($this->params[0],$this->params[1]);
                                    break;
                                case 3:
                                    $obj->{$this->method}($this->params[0],$this->params[1],$this->params[2]);
                                    break;
                                case 4:
                                    $obj->{$this->method}($this->params[0],$this->params[1],$this->params[2],$this->params[3]);
                                    break;
                                case 5:
                                    $obj->{$this->method}($this->params[0],$this->params[1],$this->params[2],$this->params[3],$this->params[4]);
                                    break;
                                default:
                                    $obj->{$this->method}($this->params);
                                    break;
                            }
                        }else{
                            echo '404-Sayfa bulunamadi';
                        }
                    }else{
                        call_user_func($this->mlist[$k]);
                    }

                    $match++;
                }else{
                    // echo 'yonlendirme ayarlari yapilmamis';
                }
            }

        }else{
            // echo 'Yonlendirme ayarlari yapilmamis...';
        }

        if($match == 0){
            $controller = 'Controllers\\'.ucfirst($this->class);
            if(\Core\Loader\Loader::load($controller)){

                $obj = new $controller();

                switch(count($this->params)){
                    case 0:
                        $obj->{$this->method}();
                        break;
                    case 1:
                        $obj->{$this->method}($this->params[0]);
                        break;
                    case 2:
                        $obj->{$this->method}($this->params[0],$this->params[1]);
                        break;
                    case 3:
                        $obj->{$this->method}($this->params[0],$this->params[1],$this->params[2]);
                        break;
                    case 4:
                        $obj->{$this->method}($this->params[0],$this->params[1],$this->params[2],$this->params[3]);
                        break;
                    case 5:
                        $obj->{$this->method}($this->params[0],$this->params[1],$this->params[2],$this->params[3],$this->params[4]);
                        break;
                    default:
                        $obj->{$this->method}($this->params);
                        break;
                }
            }else{
                echo '404-Sayfa bulunamadi 2';
            }
        }
    }


    
}