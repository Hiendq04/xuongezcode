<?php 
    namespace App\Controllers\Client;

    use App\Models\Course;
    use App\Models\Category;
    use App\Models\CategoryCourses;
    use App\Controllers\Client\BaseController;
    // use App\Views\Client;
    class CourseController extends BaseController {
        protected $courseModel;
        public function __construct(){
            $this->courseModel = new Course();
        }
        public function Course_Cat($idCat){
            $header = $title = "Khóa học";
            $coursesCat = (new CategoryCourses) -> couCatAll(['*'],'category_id = '.$idCat);
            $arrCourse = [];
            foreach ($coursesCat as $couId) {
                $courses = $this -> courseModel -> CourseFind($couId['course_id']);   
                $arrCourse[] = $courses;
            }
            echo "<pre>";
            print_r($arrCourse);
            echo "</pre>";
            // $this -> renderClient('Courses.list',compact('arrCourse','title','header'));
        }
    }

?>
