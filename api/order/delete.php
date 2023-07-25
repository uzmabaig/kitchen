<?php
include '../../model/Product.php'; 

if($_SERVER['REQUEST_METHOD'] === 'DELETE'){

if(isset($_GET['id'])){

$product = new Product();
$order_id = $_GET['id'];
$order_delete = $product->order_del($order_id);


if($order_delete === true){
    http_response_code(200);
    echo json_encode(['result' => 'Successfully Deleted']);
   }
}
   }else{
      http_response_code(400);
      echo json_encode(['result' => 'Request Type Error']);
   }
 

?>