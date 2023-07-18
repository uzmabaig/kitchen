<?php

include '../../model/Product.php'; 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
$product = new Product();

$data = [
    'product_id' => $_POST['product_id'],
    'user_id' => $_POST["user_id"],
    'qty' => $_POST['qty'],
    'status' =>$_POST['status'],
       ];
         
     
      if($data['qty'] == ''){
        echo 'Please enter quantity';
        return false;

        }elseif($data['status'] == ''){
         echo 'Please enter status';
         return false;
        } 

   
    
    $data['date']= date('y-m-d H:i:s');
    $add_order = $product->add_order($data);
    echo json_encode($add_order);
    }else {
     http_response_code(500);
     echo json_encode(['result' => 'Request Type Error']);
    }
 ?>