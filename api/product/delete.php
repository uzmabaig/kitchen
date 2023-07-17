<?php
include '../../model/Product.php'; 

if($_SERVER['REQUEST_METHOD'] === 'DELETE'){

$product = new Product();
$product_id = $_GET['id'];
$product_delete = $product->delete_product_by_id($product_id);
http_response_code(200);
echo json_encode($product_delete);

} else {
    http_response_code(500);
    echo json_encode(['result' => 'Request Type Error']);
 }

?>