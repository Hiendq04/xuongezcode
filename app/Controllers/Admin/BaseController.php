<?php 
    namespace App\Controllers\Admin;

    use eftec\bladeone\BladeOne;

    class BaseController {
        protected function renderAdmin($view,$data=[]){
            $viewDir = './app/Views/Admin';
            $storageDir = './storage';
            $blade = new BladeOne($viewDir,$storageDir,BladeOne::MODE_DEBUG); // MODE_DEBUG allows to pinpoint troubles.
            echo $blade->run($view,$data);
        }
    }
    
?>
