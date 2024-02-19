<?php 
    namespace App\Models;

    use PDO;
    class BaseModel{
        public function getConnect(){
            $connect = new PDO("mysql:host=". dbhost .
            ";dbname=". dbname, username, password
        );

        return $connect;
        }

        function all($table, $select = ['*'], $where = 1){
        $conn = $this -> getConnect();
        $select = implode(',',$select);
        $sql = "SELECT $select FROM `$table` where $where";
        $stmt = $conn->prepare($sql);
        $stmt -> execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    function find($table, $select = ['*'], $where = 1){
        $conn = $this -> getConnect();
        $select = implode(',',$select);
        $sql = "SELECT $select FROM `$table` where $where";
        $stmt = $conn->prepare($sql);
        $stmt -> execute();
        $list = $stmt->fetch(PDO::FETCH_ASSOC);
        return $list;
    }

    function update($table,$id = 0, $data = []){
        $conn = $this -> getConnect();
        $datas = [];
        foreach($data as $key => $value){
            $datas[] = "`$key` = '$value'";
        }
        $dataSql = implode(', ',$datas); 
        $sql = "UPDATE `$table` SET $dataSql WHERE `$table`.`id` = $id";
        $stmt = $conn->prepare($sql);
        return $stmt->execute();
    }


    function insert($table,$data = []){
        $conn = $this -> getConnect();
        $values = array_values($data);
        $value = implode("','",$values);
        $keys = array_keys($data);
        $key = implode('`,`',$keys);
        $sql = "INSERT INTO `$table` (`$key`) VALUES ('$value')";
        $stmt = $conn->prepare($sql);
        return $stmt->execute();
    }

    function lastInsertId($table,$data = []){
        $conn = $this -> getConnect();
        $values = array_values($data);
        $value = implode("','",$values);
        $keys = array_keys($data);
        $key = implode('`,`',$keys);
        $sql = "INSERT INTO `$table` (`$key`) VALUES ('$value')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $conn->lastInsertId();
    }


    function delete($table,$id){
        $conn = $this -> getConnect();
        $sql = "DELETE FROM $table WHERE `$table`.`id` = $id";
        $stmt = $conn->prepare($sql);
        return $stmt->execute();
    }

    function updateUp($table,$id,$truong,$count){
        $conn = $this -> getConnect();
        $sql = "UPDATE `$table` SET `$truong` = `$truong` + $count WHERE `$table`.`id` = $id";
        $stmt = $conn->prepare($sql);
        return $stmt->execute();
    }
    function updateDown($table,$id,$truong,$count){
        $conn = $this -> getConnect();
        $sql = "UPDATE `$table` SET `$truong` = `$truong` - $count WHERE `$table`.`id` = $id";
        $stmt = $conn->prepare($sql);
        return $stmt->execute();
    }
    }
?>
