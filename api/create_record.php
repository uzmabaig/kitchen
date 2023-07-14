<?php
include '../model/Product.php'; 

$product = new Product();

$data = $_GET;
$data = [
  'name' =>$data['name'],
  'description' =>$data['description'],
  'price' =>$data['price'],
  'image' => 'image',
  'date'=> date('y-m-d H:i:s')
    ];
         
  $add_products= $product->add($data);
  echo json_encode($add_products);

 ?>
