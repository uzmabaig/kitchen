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
         
      if($data['product_id'] == ''){
        echo 'Please enter valid product_id';
        return false;
      }elseif
        (!preg_match('/[0-9]/',$data['product_id'])){
        echo 'Please enter product_id in integer form';
        return false;
      }

      if($data['user_id'] == ''){
        echo 'Please enter valid user_id';
        return false;
      }elseif
        (!preg_match('/[0-9]/',$data['user_id'])){
        echo 'Please enter user_id in integer form';
        return false;
      }

      if($data['qty'] == ''){
        echo 'Please enter quantity';
        return false;
      }elseif
        (!preg_match('/[0-9]/',$data['qty'])){
        echo 'Please enter quantity in integer form';
        return false;
      }

      if($data['status'] == ''){
        echo 'Please enter status';
        return false;
      }elseif
      (!preg_match('/[a-zA-Z ]/',$data['status'])){
      echo 'Please enter status in alphabets';
      return false;

      }else{
        http_response_code(403);
      } 

    $data['date']= date('y-m-d H:i:s');
    $add_order = $product->add_order($data);

    if($add_order == true){
      http_response_code(200);
      echo json_encode(['result' => 'Successfully Created']);
      }

     }else{
      http_response_code(400);
      echo json_encode(['result' => 'Request Type Error']);
      }
      


   
 ?>