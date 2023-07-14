<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rest-Api</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/custom.css">
    <!-- <script src="js/bootstrap.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
<div class="container">
   <div class="row mt-4">
   <table class="table">
  <thead>
    <tr>
      <th scope="col">Order_id</th>
      <th scope="col">product_id</th>
      <th scope="col">User_id</th>
      <th scope="col">Quantity</th>
      <th scope="col">Status</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>

  </tbody>
  </table> 
  </body>

  <script>
   $.ajax({
        type :'GET',
        url: 'http://localhost/kitchen/api/products.php',
        success: function(data){
           data = JSON.parse(data);
          tableBody = $('table > tbody');
          data.forEach((item) => {
                var row = "<tr>"+
                    '<td>'+item.order_id+'</td>'+
                    '<td>'+item.product_id+'</td>'+
                    '<td>'+item.user_id+'</td>'+
                    '<td>'+item.qty+'</td>'+
                    '<td>'+item.status+'</td>'+
                    '<td>'+item.date+'</td>'+
                '</tr>';
                tableBody.append(row);
              });

     }

});
</script>

</html> 