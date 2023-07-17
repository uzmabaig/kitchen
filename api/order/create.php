<?php

include '../../model/Product.php'; 

$product = new Product();

$data = [
        'product_id'=>$_GET['id'],
        'user_id'=>$_SESSION["user_id"],
        'qty' => 1,
        'status' => 'pending',
        'date'=> date('y-m-d H:i:s')
       
         ];
         
  
 $add_order = $product->add_order($data);
  echo json_encode($add_order);

 ?>