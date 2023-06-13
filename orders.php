<?php
require 'Order.php';

if(isset($_POST['submit'])){
$data = $_POST;
$errors= array();

$data = [
    'qty'  =>$data['qty'],
    'status' => $data['status'],
    'date'=> date('y-m-d H:i:s')
     ];
  $order = new Order();
  $add_orders = $order->add($data);
  
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Orders</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/custom.css">
    <!-- <script src="js/bootstrap.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
       
</head>
<body>
<div class="container">
   <div class="row mt-4">
   <div class=" mt-4 mb-4 col-md-6 offset-3" style="background-color:lightblue" >
   <form action="orders.php" method="post" id="form">
   <div class="row col-md-8 mt-4 offset-2">
        <label for ="qty">Quantity:</label>
        <input type="number" id="qty" name="qty" class="form-control">
        </div>
        <div class="row col-md-8 mt-4 offset-2">
        <label for ="status">Status:</label>
        <input type="text" class="form-control" id="status" name="status" >
        </div>
        <br>
        <div class="row col-md-6 mb-4 offset-3">
        <input type="submit" class= "btn btn-secondary" value='Submit' name='submit' id="submit">
        </div>
        </form>
</div>
        </div>
      </div>
</body>


</html> 