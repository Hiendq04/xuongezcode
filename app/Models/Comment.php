<?php
namespace App\Models;

use App\Models\BaseModel;

class Comment extends BaseModel{
    protected $table = "comments";
    function CommentInsert($data = []){
        return $this -> insert($this -> table, $data);
    }
    function CommentFind($where = 1, $select = ['*']){
        return $this -> find($this -> table, $select, $where);
    }
    function CommentAll($select = ['*'], $where = 1){
        return $this -> all($this -> table, $select, $where);
    }
    function CommentDelete($id = 0){
        return $this -> delete($this -> table, $id);
    }
    function CommentUpdate($id = 0, $data = []){
        return $this -> update($this -> table, $id, $data);
    }
}
?>