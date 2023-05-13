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
    public function delete_product_by_id($id){
        return $this->products_productdel($id); 
    }

    public function update_product_by_id($id){
        return $this->products_productupdate($id); 
    }

}

?>