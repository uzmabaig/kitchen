<?php

include '../../model/Product.php'; 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $errors= array();
  
$product = new Product();
 $error = [];

    $data = $_POST;

      if(!isset($data['product_id']) || $data['product_id'] === ""){
        $error['product_id'] = 'Please enter valid product_id';

      }elseif
      (!preg_match('/[0-9]/',$data['product_id'])){
        $error['product_id'] = 'Please enter product_id in integer form';
      }

      if(!isset($data['user_id']) || $data['user_id'] === ''){
        $error['user_id'] = 'Please enter valid user_id';
       
      }elseif
        (!preg_match('/[0-9]/',$data['user_id'])){
         $error['user_id'] ='Please enter user_id in integer form';
       }

      if(!isset($data['qty']) || $data['qty'] === ''){
        $error['qty'] ='Please enter quantity';

      }elseif
        (!preg_match('/[0-9]/',$data['qty'])){
         $error['qty'] ='Please enter quantity in integer form';
      }

      if(!isset($data['status']) ||$data['status'] === ''){
        $error['status'] ='Please enter status';
      
      }elseif
      (!preg_match('/[a-zA-Z ]/',$data['status'])){
       $error['status'] ='Please enter status in alphabets';
      }
 
       if(!empty($error)){
        http_response_code(403);
        echo json_encode($error);
        return false;
      }

    $data['date']= date('y-m-d H:i:s');
    $add_order = $product->add_order($data);

    if($add_order === true){
      http_response_code(200);
      echo json_encode(['result' => 'Successfully Created']);
      }
    }else{
      http_response_code(400);
      echo json_encode(['result' => 'Request Type Error']);
      }
      


   
 ?>