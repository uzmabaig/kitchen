<?php
include '../../model/Product.php';

if($_SERVER['REQUEST_METHOD'] === 'GET'){

   $product = new Product();
   $limit = 5;
   $page = $_GET['page'];
   $offset = 0;  
  
   if($page != 1) {
      $offset = ($page * $limit) - $limit;
     }
    $order_data = $product->get_order_list($limit,$offset);
    http_response_code(200);
    echo json_encode($order_data);

 
} else {
   http_response_code(500);
   echo json_encode(['result' => 'Request Type Error']);
}

   ?>