<?php
    class Bootstrap {
        public static function run(Request $peticion){
            $controller = $peticion->getControlador(). 'controller';
            $rutaControlador = ROOT. 'controllers'.DS. $controller. '.php';
            $metodo =$peticion->getMetodo();
            
            if (is_readable($rutaControlador)){
                require_once $rutaControlador;
                
                $controller =new $controller;
                if (is_callable(array($controller,$metodo))){
                    $metodo =$peticion->getMetodo();
                }
                else{
                    $metodo='index';
                }
                if (isset($peticion->getArgs())){
                    call_user_func_array(array($controlador,$metodo), $peticion->getArgs());
                }
            }
    }
   }
?>
