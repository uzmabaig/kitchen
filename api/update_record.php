<?php
include '../model/Product.php';


// $product = new Product();
//  $product_id = $_GET['id'];
// $product_get = $product->get_product_by_id($product_id); by this method we get record from database
// echo json_encode($product_get);

$product = new Product();
 $product_id = $_GET['id'];
$product_data = $_GET;
$product_update = $product->update_products_for_api($product_id,$product_data);
echo json_encode($product_update)




 
 ?>