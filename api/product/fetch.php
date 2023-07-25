<?php
include '../../model/Product.php';

if($_SERVER['REQUEST_METHOD'] === 'GET'){
   

   $product = new Product();
   $product_data = $product->get_product_list();
   
   if($product_data == true){
      http_response_code(200);
      echo json_encode($product_data);
      }
    
     }else{
        http_response_code(400);
        echo json_encode(['result' => 'Request Type Error']);
     }

   ?>