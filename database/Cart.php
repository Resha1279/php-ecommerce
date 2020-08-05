<?php

class Cart{
    public $db = null;

    public function __construct(DbController $db){
        if(!isset($db->conn)) return null;
        $this->db = $db;
    }

    public function insertintoCart($params = null, $table = 'cart'){
        if($this->db->conn != null){
            if($params != null){

                //get columns
                $columns = implode(',',array_keys($params));
                $values = implode(',',array_values($params));

                //create query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)",$table,$columns,$values);

                //execute query
                $result = $this->db->conn->query($query_string);
                return $result;
            }
        }
    }

    //geu user  id and item id
    public function addtoCart($userid,$itemid){
        if(isset($userid)&&isset($itemid)){
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid
            );

            $result = $this->insertintoCart($params);
            if($result){
                //do sonething
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }

     // calculate sub total
     public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach ($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f' , $sum);
        }
    }

     // delete cart item using cart item id
     public function deleteCart($item_id = null, $table = 'cart'){
        if($item_id != null){
            $result = $this->db->conn->query("DELETE FROM {$table} WHERE item_id={$item_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    // get item_id of shopping cart list
    public function getCartId($cartArray = null, $key = "item_id"){
        if ($cartArray != null){
            $cart_id = array_map(function ($value) use($key){
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }

      // Save for later
      public function saveForLater($item_id = null, $saveTable = 'wishlist', $fromTable = 'cart'){
        if ($item_id != null){
            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id={$item_id};";
            $query .= "DELETE FROM {$fromTable} WHERE item_id={$item_id}";

            // execute multiple query
            $result = $this->db->conn->multi_query($query);

            if($result){
                header("Location :" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }
}