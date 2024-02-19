<?php 
    namespace App\Models;

    use App\Models\BaseModel;

    class Rate extends BaseModel{
        protected $table = "ratings";
        function RateInsert($data = []){
            return $this -> insert($this -> table, $data);
        }
        function RateFind($where = 1, $select = ['*']){
            return $this -> find($this -> table, $select, $where);
        }
        function RateAll($select = ['*'], $where = 1){
            return $this -> all($this -> table, $select, $where);
        }
        function RateDelete($id = 0){
            return $this -> delete($this -> table, $id);
        }
        function RateUpdate($id = 0, $data = []){
            return $this -> update($this -> table, $id, $data);
        }
    }
?>
