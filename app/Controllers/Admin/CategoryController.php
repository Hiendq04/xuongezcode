<?php 
    namespace App\Controllers\Admin;

    use App\Controllers\Admin\BaseController;
    use App\Models\Category;
    use App\Models\CategoryCourses;

    class CategoryController extends BaseController{
        protected $categoryModel;
        protected $CatCourseModel;
        public function __construct(){
            $this -> categoryModel = new Category();
            $this -> CatCourseModel = new CategoryCourses();
        }
        public function list(){
            $header = $title = 'Danh sách danh mục';
            $categories = $this -> categoryModel -> CategoryAll();
            $this -> renderAdmin('Category.list',compact('categories','title','header'));
        }
        public function add(){
            $header = $title = 'Thêm mới danh mục';
            $this -> renderAdmin('Category.add',compact('title','header'));
        }
        public function addCat(){
            // var_dump($_POST);
            // echo "<br>";
            // var_dump($_FILES['thumbnail']);die;
            if($_POST['name']!=''){
                $img = $_FILES['thumbnail'];
                $imgPath = NULL;
                if ($img['error'] === UPLOAD_ERR_OK) {
                    $targetDirectory = "Public/Uploads/";
                    $targetPath = $targetDirectory . basename($img['name']);

                    if (move_uploaded_file($img['tmp_name'], $targetPath)) {
                        $imgPath = basename($img['name']);
                    }
                }
                $data = [
                    'name' => $_POST['name'],
                    'description' => $_POST['description'],
                    'thumbnail' => $imgPath,
                    'status' => 'active'
                ];
                $this -> categoryModel -> CategoryInsert($data);
                setcookie('addCat',true,time()+1);
                header('Location: '.routeAdmin('/category/add'));
            }else{
                setcookie('errCat',true,time()+1);
                header('Location: '.routeAdmin('/category/add'));
            }
        }
        public function info($idCat){
            $header = $title = "Chi tiết danh mục";
            $category = $this -> categoryModel -> CategoryFind('id = '.$idCat);
            $this -> renderAdmin('Category.info',compact('category','header','title'));
        }

        public function update($idCat){
            $category = $this -> categoryModel -> CategoryFind('id = '.$idCat);
            $img = $_FILES['thumbnail'];
            $imgPath = $category['thumbnail'];
            if ($img['error'] === UPLOAD_ERR_OK) {
                $targetDirectory = "Public/Uploads/";
                $targetPath = $targetDirectory . basename($img['name']);

                if (move_uploaded_file($img['tmp_name'], $targetPath)) {
                    $imgPath = basename($img['name']);
                }
            }
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'thumbnail' => $imgPath,
                'status' => $_POST['status']
            ];
            $this->categoryModel->CategoryUpdate($idCat,$data);
            setcookie('update',true,time()+1);
            header('Location: '.routeAdmin('/category/info/'.$idCat));
        }
    }
?>
