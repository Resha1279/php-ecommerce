<?php

class DbController{
    
    //Database connection properties
    protected $host='localhost';
    protected $user='resha';
    protected $password='resha';
    protected $database='shopp';

    public $conn = null;

    //constructor
    public function __construct(){
        $this->conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        if($this->conn->connect_error){
            echo "Fail" . $this->conn->connect_error;
        }
    }

    public function __destruct(){
        $this->closeConnection();
    }

    //close connection
    protected function closeConnection(){
        if($this->conn != null){
            $this->conn->close();
            $this->conn=null;
        }
    }
    
}



