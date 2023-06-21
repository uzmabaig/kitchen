<?php

include "Database.php";


class User extends Database {
    public function add($data){
      return $this->usersinfo_save($data);
        
    }

    public function get($email,$password){
        return $this->usersinfo_get($email,$password);
    }

    public function get_email_by_check($email){
      return $this->email_get($email);
    }

  public function save_password($password){
    return $this->update_password($password);
   }


 }


?>