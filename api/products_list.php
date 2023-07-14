<?php
include '../model/Product.php';

 $product = new Product();
 $order_list = $product->get_order_list();
 echo json_encode($order_list);






?>