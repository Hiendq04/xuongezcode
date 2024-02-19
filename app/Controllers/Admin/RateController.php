<?php 
    namespace App\Controllers\Admin;

    use App\Models\Rate;
    use App\Models\Account;
    use App\Models\Course;
    use App\Controllers\Admin\BaseController;

    class RateController extends BaseController{
        protected $rateModel;
        protected $userModel;
        protected $courseModel;
        public function __construct(){
            $this -> rateModel = new Rate();
            $this -> userModel = new Account();
            $this -> courseModel = new Course();
        }
        public function list(){
            $title = $header = "Danh sách đánh giá";
            $rates = [];
            $listRate = $this -> rateModel -> RateAll();
            foreach($listRate as $rate){
                $user = $this -> userModel -> AccountFind('id = '.$rate['user_id']);
                $course = $this -> courseModel -> CourseFind('id = '.$rate['course_id']);
                if(!empty($user)){
                    $rate['username'] = $user['username'];
                }else{
                    $rate['username'] = 'Tài khoản không tồn tại!';
                }
                if(!empty($course)){
                    $rate['course_name'] = $course['name'];
                }else{
                    $rate['course_name'] = 'Khóa học không tồn tại';
                }
                $rates[] = $rate;
            }
            if(isset($_POST['btn-deletes-r'])){
                $btn = array_pop($_POST);
                $check = false;
                foreach($_POST as $id){
                    $this -> rateModel -> RateDelete($id);
                    $check = true;
                }
                setcookie('deletes',true,time()+1);
                header('Location: '.routeAdmin('/rating/list'));
            }
            $this -> renderAdmin('Rating.list',compact('rates','title','header'));
        }
        public function delete($idRating){
            $this -> rateModel -> RateDelete($idRating);
            $_SESSION['delete'] = true;
            header('Location: '.routeAdmin('/rating/list'));
        }
    }
?>
