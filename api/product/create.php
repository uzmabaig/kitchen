<?php
include '../../model/Product.php'; 

if($_SERVER['REQUEST_METHOD'] === 'POST'){

$product = new Product();
$error = [];
$data = $_POST;
  if(!isset($data['name']) || $data['name'] === '' || !preg_match('/[a-zA-Z ]/',$data['name'])){
    $error['name'] ='Please enter valid name';
  } 
  
  if(!isset($data['description']) ||$data['description'] === ''){
    $error['description'] ='Please enter valid description';

  }elseif
  (str_word_count($data['description']) > 100 ){
    $error['description'] = 'you can use only 100 words to describe product in detail';
  } 

  if(!isset($data['price']) || $data['price'] === ''){
    $error['price'] ='Please enter valid price';
    
  }elseif
    ($data['price'] >= 100000){
      $error['price'] ='your price of product should be under 5 digits';
    
  }
  if(!empty($error)){
    http_response_code(403);
    echo json_encode($error);
    return false;
    }

  $data['image'] ='image';
  $data['date']= date('y-m-d H:i:s');
  $add_products= $product->add($data);

if($add_products === true){
  http_response_code(200);
  echo json_encode(['result' => 'Successfully Created']);
  }

 }else{
    http_response_code(400);
    echo json_encode(['result' => 'Request Type Error']);
 }

 ?>
