<?php

include "Database.php";

class Product extends Database {
    public function add($data){
      return $this->products_save($data);
        
    }
    public function get(){
        return $this->products_get();
    }
    public function get_product_by_id($id){
        return $this->products_productinfo($id); 
    }
    public function delete_product_by_id($id){
        return $this->products_del($id); 
    }

    public function update_product_by_id($id,$details){
        return $this->products_update($id,$details); 
    }

    public function add_order($data){
        return $this->order_save($data);
          
    }

    public function get_product_by_name($name){
        return $this->search_product($name);
          
    }

    public function check_product_in_cart(){
        return $this->mycart();
          
    }

    public function delete_order($id){
      return $this->order_del($id); 
    } 

    public function get_order_list($limit,$offset){
        return $this->orders_list($limit,$offset);
    }

    public function get_product_list(){
        return $this->products_list();
    }

}

?>