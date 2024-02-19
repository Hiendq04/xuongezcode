<?php 
    namespace App\Controllers\Admin;

    use App\Models\Category;
    use App\Models\Course;
    use App\Models\CategoryCourses;
    use App\Controllers\Admin\BaseController;

    class CourseController extends BaseController{
        protected $courseModel;
        protected $catModel;
        protected $catCouModel;
        public function __construct(){
            $this -> courseModel = new Course();
            $this -> catModel = new Category();
            $this -> catCouModel = new CategoryCourses();
        }
        public function list(){
            $title = $header = 'Danh sách khóa học';
            $courses = [];
            $listCourse = $this -> courseModel -> CourseAll();
            foreach($listCourse as $course){
                $listCatCou = $this -> catCouModel -> couCatAll(['*'],'course_id = '.$course['id']);
                $catName = [];
                foreach($listCatCou as $catCou){
                    if(empty($catCou)){
                        $catCou[] = 'Danh mục không tồn tại';
                    }else{
                        $cat = $this -> catModel -> CategoryFind('id = '.$catCou['category_id']);
                        $catCou['name'] = (!empty($cat)) ? $cat['name'] : '';
                        $catName[] = $catCou['name'];
                    }
                }
                $course['cat_name'] = $catName;
                $courses[] = $course;
            }
            $this -> renderAdmin('Course.list',compact('courses','title','header'));
        }
    }
?>
