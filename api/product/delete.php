<?php
include '../../model/Product.php'; 

if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
   if(isset($_GET['id'])){

$product = new Product();
$product_id = $_GET['id'];
$product_delete = $product->delete_product_by_id($product_id);

if($product_delete === true){
    http_response_code(200);
    echo json_encode(['result' => 'Successfully Deleted']);
   }
}
   }else{
      http_response_code(400);
      echo json_encode(['result' => 'Request Type Error']);
   }

?>