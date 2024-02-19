<?php 
    namespace App\Controllers\Client;

    use eftec\bladeone\BladeOne;

    class BaseController {
        protected function renderClient($view,$data=[]){
            $viewDir = './app/Views/Client';
            $storageDir = './storage';
            $blade = new BladeOne($viewDir,$storageDir,BladeOne::MODE_DEBUG); // MODE_DEBUG allows to pinpoint troubles.
            echo $blade->run($view,$data);
        }
    }
    
?>
