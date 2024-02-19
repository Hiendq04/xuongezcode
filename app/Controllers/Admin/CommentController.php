<?php 
    namespace App\Controllers\Admin;
    
    use App\Models\Comment;
    use App\Models\Course;
    use App\Models\Account;
    use App\Controllers\Admin\BaseController;

    class CommentController extends BaseController{
        protected $commentModel;
        protected $courseModel;
        protected $accountModel;
        public function __construct(){
            $this -> commentModel = new Comment();
            $this -> courseModel = new Course();
            $this -> accountModel = new Account();
        }
        public function list(){
            $title = $header = "Danh sách bình luận";
            $comments = [];
            $listComments = $this -> commentModel -> CommentAll();
            foreach($listComments as $com){
                $course = $this -> courseModel -> CourseFind('id = '.$com['course_id']);
                $user = $this -> accountModel -> AccountFind('id = '.$com['user_id']);
                if(!empty($course)){
                    $com['course_name'] = $course['name'];
                }else{
                    $com['course_name'] = 'Khóa học không tồn tại!';
                }
                if(!empty($user)){
                    $com['username'] = $user['username'];
                }else{
                    $com['username'] = 'Tài khoản không tồn tại!';
                }
                $comments[] = $com;
            }
            if(isset($_POST['btn-deletes-c'])){
                $btn = array_pop($_POST);
                $check = false;
                foreach($_POST as $id){
                    $this -> commentModel -> CommentDelete($id);
                    $check = true;
                }
                setcookie('deletes',true,time()+1);
                header('Location: '.routeAdmin('/comments/list'));
            }
            if(isset($_POST['btn-lock-c'])){
                $btn = array_pop($_POST);
                foreach($_POST as $id){
                    $data = [
                        'status' => 'inactive',
                    ];
                    $this -> commentModel -> CommentUpdate(''.$id, $data);
                    $checkListCom = true;
                }
                setcookie('lock',true,time()+1);
                header('Location: '.routeAdmin('/comments/list'));
            }
            if(isset($_POST['btn-unlock-c'])){
                $btn = array_pop($_POST);
                foreach($_POST as $id){
                    $data = [
                        'status' => 'active',
                    ];
                    $this -> commentModel -> CommentUpdate(''.$id, $data);
                    $checkListCom = true;
                }
                setcookie('unlock',true,time()+1);
                header('Location: '.routeAdmin('/comments/list'));
            } 
            $this -> renderAdmin('Comment.list',compact('comments','header','title'));
        }
        public function delete($idCom){
            $this -> commentModel -> CommentDelete($idCom);
            $_SESSION['delete'] = true;
            header('Location: '.routeAdmin('/comments/list'));
        }
    }
?>
