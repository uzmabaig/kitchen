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
    
        public function save($data){
            $con = $this->connect();
            $sql = "INSERT into customers values {null,'{$data['name']}','{$data['date_of_birth']}','{$data['email']}','{$data['password']}','{$data['date']}'}";
            $result = $con->query($sql);
            return $result;
        }
}







    ?>