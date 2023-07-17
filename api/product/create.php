<?php
include '../../model/Product.php'; 

if($_SERVER['REQUEST_METHOD'] === 'POST'){

$product = new Product();

$data = [
  'name' =>$_POST['name'],
  'description' =>$_POST['description'],
  'price' =>$_POST['price'],
   ];

   $data = $_GET;
if($data['name'] == '' || !preg_match('/[a-zA-Z ]/',$data['name'])){
   echo 'Please enter valid name';
   return false;
 } 
 if($data['description'] == ''){
   echo 'Please enter the product description';
   return false;
            
}elseif
  (str_word_count($data['description']) > 100 ){
  echo 'you can use only 100 words to describe product in detail';
  return false;
} 

if($data['price'] == ''){
   echo 'Please enter the product price';
  return false;
}elseif
  ($data['price'] >= 100000){
   echo 'your price of product should be under 5 digits';
   return false;
}


$data['image'] ='image';
$data['date']= date('y-m-d H:i:s');
$add_products= $product->add($data);
http_response_code(200);
echo json_encode($add_products);

}else {
  http_response_code(500);
  echo json_encode(['result' => 'Request Type Error']);
}

 ?>
