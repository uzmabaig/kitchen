<?php

include "Database.php";

class Product extends Database {
    public function add($data){
        $this->products_save($data);
    }
    public function get(){
        return $this->products_get();
    }
    public function get_product_by_id($id){
        return $this->products_productinfo($id); 
}


}

?>