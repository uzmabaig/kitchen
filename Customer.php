<?php

include "Database.php";

class Customer extends Database {
    public function add($data){
        $this->customers_save($data);
    }


}

?>