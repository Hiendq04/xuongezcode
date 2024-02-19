<?php
namespace App\Models;

use App\Models\BaseModel;

class Account extends BaseModel{
    protected $table = "users";
    function AccountInsert($data = []){
        return $this -> insert($this -> table, $data);
    }
    function AccountFind($where = 1, $select = ['*']){
        return $this -> find($this -> table, $select, $where);
    }
    function AccountAll($select = ['*'], $where = 1){
        return $this -> all($this -> table, $select, $where);
    }
    function AccountDelete($id = 0){
        return $this -> delete($this -> table, $id);
    }
    function AccountUpdate($id = 0, $data = []){
        return $this -> update($this -> table, $id, $data);
    }
}
?>