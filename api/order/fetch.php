<?php
include '../../model/Product.php';

if($_SERVER['REQUEST_METHOD'] === 'GET'){
   if(isset($_GET['page'])){
      
   $product = new Product();
   $limit = 5;
   $page = $_GET['page'];
   $offset = 0;  
  
   if($page != 1) {
      $offset = ($page * $limit) - $limit;
     }
    $order_data = $product->get_order_list($limit,$offset);
    if($order_data == true){
      http_response_code(200);
      echo json_encode($order_data);
      }
   }
     }else{
        http_response_code(400);
        echo json_encode(['result' => 'Request Type Error']);
     }

   ?>