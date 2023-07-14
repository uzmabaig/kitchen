<?php
include '../model/Product.php'; 

$product = new Product();
$order_id = $_GET['id'];
$order_delete = $product->order_del($order_id);
echo json_encode($order_delete);

?>