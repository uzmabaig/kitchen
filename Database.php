<?php
class Database { 

    const HOST = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = null;
    const PORT = 3306;
    const DATABASE_NAME = 'kitchen';

    protected function connect(){

        // Create connection
        $conn = new mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DATABASE_NAME);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // echo "Connected successfully";
        return $conn;
      }
        public function customers_save($data){
            
            $con = $this->connect();
            $sql = "INSERT into customers values (null,'{$data['name']}','{$data['date_of_birth']}','{$data['email']}','{$data['password']}','{$data['date']}')";
            $result = $con->query($sql);
            return $result;
        }
         public function products_save($data){
            
            $con = $this->connect();
            $sql = "INSERT into products values (null,'{$data['name']}','{$data['description']}','{$data['price']}','{$data['date']}')";
            $result = $con->query($sql);
            return $result;
        }
        public function products_get(){
            
            $con = $this->connect();
            $sql = "select * from products";
            $result = $con->query($sql);
            $res = $result->fetch_all(MYSQLI_ASSOC);
            return $res;
        }

        public function products_productinfo($id){
            
            $con = $this->connect();
            $sql = "select * from products Where product_id= {$id}";
            $result = $con->query($sql);
            $res = $result->fetch_assoc();
            return $res;
        }
       
        public function products_productdel($id){
            
            $con = $this->connect();
            $sql = "delete from products Where product_id= {$id}";
            $result = $con->query($sql);
            return $result;
        }

         public function products_productupdate($id,$details){
            
            $con = $this->connect();
            $sql = "UPDATE products SET name ='".$details['name']."' , description = '".$details['description']."' , price = {$details['price']} WHERE product_id= {$id}";
            $result = $con->query($sql);
            return $result;
         }
}

 ?>
 