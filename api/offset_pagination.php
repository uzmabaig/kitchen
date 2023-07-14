<?php
include '../model/Product.php';

 $product = new Product();
  $limit = 5;
  $page = $_GET['page'];
  $offset = 0;  
 
  if($page != 1) {
     $offset = ($page * $limit) - $limit;
    }
   $order_limit = $product->get_order_limit($limit,$offset);
   echo json_encode($order_limit);

   ?>