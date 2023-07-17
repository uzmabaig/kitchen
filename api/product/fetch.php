<?php
include '../../model/Product.php';

if($_SERVER['REQUEST_METHOD'] === 'GET'){
   

   $product = new Product();
   $product_data = $product->get_product_list();
   http_response_code(200);
   echo json_encode($product_data);

 
} else {
   http_response_code(500);
   echo json_encode(['result' => 'Request Type Error']);
}

   ?>