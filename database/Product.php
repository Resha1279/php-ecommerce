<?php

class Product{
    public $db = null;

    public function __construct(DbController $db){
        if(!isset($db->conn)) return null;
        $this->db = $db;
    }

    //fetch product
    public function getData($table = 'product'){
       $result = $this->db->conn->query("SELECT * FROM {$table}");

       $resultArray = array();

       while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
           $resultArray[] = $item;
       }

       return $resultArray;
    }

    //get product using item id
    public function getProduct($item_id = null, $table='product'){
        if(isset($item_id)){
        $result = $this->db->conn->query("SELECT * FROM {$table} WHERE item_id = {$item_id}");
        $resultArray = array();

        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
 
        return $resultArray;
        }
    }
}

