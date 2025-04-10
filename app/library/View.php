<?php
    
    namespace app\library;
    use Exception;
    use League\Plates\Engine;
 
    class View {
        private static array $instances = [];

        private static function addInstances($instanceKey,$instanceClass){
            if(!isset(self::$instances[$instanceKey])){
                self::$instances[$instanceKey] = new $instanceClass;
            }
        }

        public static function render(string $view, array $data = []){
            $path = dirname(__FILE__,3);
            $filePath = $path.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR;

            if(!file_exists($filePath.$view.'.php')){
                throw new Exception("View {$view} does not exist");
            }
            self::addInstances('cart', new Cart);
           

            // Create new Plates instance 
            $templates = new Engine($filePath);
            $templates->addData(['instances'=>self::$instances]);
            echo $templates->render($view, $data);   

        }
    }
