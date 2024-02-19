<?php 
    namespace App\Controllers\Admin;

    use App\Models\Category;
    use App\Controllers\Admin\BaseController;
    
    class HomeController extends BaseController {
        protected $homeModel;
        public function __construct(){
            $this -> homeModel = new Category(); 
        }
        public function home(){
            if(!isset($_SESSION['user']) || $_SESSION['user']['role']!='admin'){
                header('Location: '.route('/'));
            }
            $title = "Trang chủ quản trị";
            $header = "Trang chủ";
            $this -> renderAdmin('Home.home',compact('title','header'));
        }
    } 
?>