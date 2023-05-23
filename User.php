<?php

include "Database.php";


class User extends Database {
    public function add($data){
      return $this->usersinfo_save($data);
        
    }

    public function get($email,$password){
        return $this->usersinfo_get($email,$password);
    }
}


?>