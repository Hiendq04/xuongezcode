<?php 
    namespace App\Models;
    use App\Models\BaseModel;
    class Category extends BaseModel{
        protected $table = "categories";
        public function CategoryAll($select = ['*'], $where = 1){
        return $this -> all($this -> table,$select,$where);
        }
        public function CategoryFind($where = 1,$select = ['*']){
            return $this -> find($this -> table,$select,$where);
        }

        public function CategoryInsert($data = []){
            return $this -> insert($this -> table,$data);
        }

        public function CategoryUpdate($id = 0,$data = []){
            return $this -> update($this -> table,$id,$data);
        }

        public function CategoryDelete($id = 0){
            return $this -> delete($this -> table,$id);
        }


    }
?>
