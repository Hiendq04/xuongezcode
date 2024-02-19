<?php 
    namespace App\Controllers\Client;

    use App\Models\Category;
    use App\Controllers\Client\BaseController;
    
    class HomeController extends BaseController {
        protected $homeModel;
        public function __construct(){
            $this -> homeModel = new Category(); 
        }
        public function list(){
            $categories = $this -> homeModel -> CategoryAll();
            $title = "Trang chủ";
            $this -> renderClient('Home.home',compact('categories','title'));
        }
    }

?>
