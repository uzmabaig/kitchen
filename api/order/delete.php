<?php
include '../../model/Product.php'; 

if($_SERVER['REQUEST_METHOD'] === 'DELETE'){

$product = new Product();
$order_id = $_GET['id'];
$order_delete = $product->order_del($order_id);
echo json_encode($order_delete);

} else {
    http_response_code(200);
    echo json_encode(['result' => 'Request Type Error']);
 }

?>