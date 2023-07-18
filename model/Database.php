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
            $sql = "INSERT into products values (null,'{$data['name']}','{$data['description']}','{$data['price']}','{$data['image']}','{$data['date']}')";
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
       
        public function products_del($id){
            
            $con = $this->connect();
            $sql = "delete from products Where product_id= {$id}";
            $result = $con->query($sql);
            return $result;
        }

        public function products_update($id,$details){
            
            $con = $this->connect();
            $sql = "UPDATE products SET name ='".$details['name']."' , description = '".$details['description']."' , price = {$details['price']} , image = '".$details['image']."' WHERE product_id= {$id}";
            $result = $con->query($sql);
            return $result;
        }
           
        public function usersinfo_save($data){
            
            $con = $this->connect();
            $sql = "INSERT into users values (null,'{$data['name']}','{$data['email']}','{$data['phone_number']}','{$data['password']}','{$data['date']}')";
            $result = $con->query($sql);
            return $result;
        }

        public function usersinfo_get($email,$password){  

            $con = $this->connect();
            $sql = "select * from users where email = '{$email}' AND password = '{$password}'";
            $result = $con->query($sql);
            $res = $result->fetch_assoc();
            return $res;

        }

        public function email_get($email){  

            $con = $this->connect();
            $sql = "select * from users where email = '{$email}'";
            $result = $con->query($sql);
            $res = $result->fetch_assoc();
            return $res;

        }

        public function order_save($data){
            
            $con = $this->connect();
            $sql = "INSERT into orders values (null,'{$data['product_id']}','{$data['user_id']}','{$data['qty']}','{$data['status']}','{$data['date']}')";
            $result = $con->query($sql);
            return $result;
        }

        public function search_product($name){
            
            $con = $this->connect();
            $sql = "select * from products where name like '%$name%'";
            $result = $con->query($sql);
            $res = $result->fetch_all(MYSQLI_ASSOC);
            return $res;
        }

        public function mycart(){
            
            $con = $this->connect();
            $sql = "SELECT products.product_id,orders.order_id,products.name, orders.qty, orders.date
                    FROM products
                    INNER JOIN orders ON products.product_id = orders.product_id
                    where orders.user_id = ".$_SESSION['user_id']."";
            $result = $con->query($sql);
            $res = $result->fetch_all(MYSQLI_ASSOC);
            return $res;

        }

        public function update_password($password){
            
            $con = $this->connect();
            $sql = "update users set password = '{$password}' where email = '".$_SESSION['email']."'";
            $result = $con->query($sql);
            return $result;
        }

        public function order_del($id){
            
            $con = $this->connect();
            $sql = "delete from orders Where order_id= {$id}";
            $result = $con->query($sql);
            return $result;

        }

       public function orders_list($limit = 10,$offset = 0){ //for api
            
            $con = $this->connect();
            $sql = "SELECT * FROM orders
                 ORDER BY order_id Limit {$limit} offset {$offset}";
            $result = $con->query($sql);
            $res = $result->fetch_all(MYSQLI_ASSOC);
            return $res;
        }

        public function products_list(){ //for api
            
            $con = $this->connect();
            $sql = "SELECT * FROM products
                 ORDER BY product_id Limit 15";
            $result = $con->query($sql);
            $res = $result->fetch_all(MYSQLI_ASSOC);
            return $res;
        }
    } 

        
 ?>
 