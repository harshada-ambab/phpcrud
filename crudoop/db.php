<?php

class dbconfig 
{
    private $connection;

    public function __construct(){
        $this->connection= new mysqli('localhost','harshada','harshada123','testDb');
        if(mysqli_connect_error()){
            die("Connect Failed");
        }
    }

    public function insert($Name,$Email){
        $query = "insert into employee (Name,Email) values ('$Name','$Email')";
        $res =mysqli_query($this->connection,$query);
        return $res;
    }

    public function fetch(){
        $query = "select * from employee";
        $res = mysqli_query($this->connection,$query);
        return $res;
    }
    public function delete($id){
        $query = "delete from employee where id = '$id'";
        $res = mysqli_query($this->connection,$query);
        return $res;
        
    }
    public function edit($Name,$Email,$id){
        $query = "update employee set Name = '$Name', Email = '$Email' where id = '$id'";
        $res = mysqli_query($this->connection,$query);
        return $res;
        
    }
    public function fetch_single($id){
        $query = "select * from employee where id = $id";
        $res = mysqli_query($this->connection,$query);
        $row = mysqli_fetch_array($res);
        return $row;
    }
    public function get_data($result_per_page,$start_from){
        $query = "select * from employee LIMIT $start_from, $result_per_page";
        $row = mysqli_query($this->connection,$query);
        return $row;
    }

    public function pagination(){     
        $query = "select * from employee order by id desc";
        $page_result=mysqli_query($this->connection,$query);
        $total_records=mysqli_num_rows($page_result);
        return $total_records;
        
    }
    
}
?>