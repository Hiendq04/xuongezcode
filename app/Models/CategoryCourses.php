<?php 
    namespace App\Models;
    use App\Models\BaseModel;

    class CategoryCourses extends BaseModel{
        protected $table = "category_courses";
        public function couCatAll($select = ['*'], $where = 1){
            return $this -> all($this -> table,$select,$where);
            }
        public function couCatFind($where = 1,$select = ['*']){
            return $this -> find($this -> table,$select,$where);
        }
    
        public function couCatInsert($data = []){
            return $this -> insert($this -> table,$data);
        }
    
        public function couCatUpdate($id = 0,$data = []){
            return $this -> update($this -> table,$id,$data);
        }
    
        public function couCatDelete($id = 0){
            return $this -> delete($this -> table,$id);
        }

    }

?>