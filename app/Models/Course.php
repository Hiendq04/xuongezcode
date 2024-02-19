<?php 
    namespace App\Models;
    use App\Models\BaseModel;
    class Course extends BaseModel{
        protected $table = "courses";
        function CourseAll($select = ['*'], $where = 1){
        return $this -> all($this -> table,$select,$where);
    }
    function CourseFind($where = 1,$select = ['*']){
        return $this -> find($this -> table,$select,$where);
    }

    function CourseInsert($data = []){
        return $this -> insert($this -> table,$data);
    }

    function CourseUpdate($id = 0,$data = []){
        return $this -> update($this -> table,$id,$data);
    }

    function CourseDelete($id = 0){
        return $this -> delete($this -> table,$id);
    }

    }
?>
