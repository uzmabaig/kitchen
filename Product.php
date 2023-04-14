<?php

include "Database.php";

class Product extends Database {
    public function add($data){
        $this->products_save($data);
    }


}

?>