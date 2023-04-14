

<!DOCTYPE html>
<html lang="en">

<head>
<title>Stock</title>
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
   <div class="mt-4 mb-4 col-md-10 offset-3">
   <form action="customers.php" method="post" id="form">
   <div class="row col-md-6 mt-4">
        <label for ="name">Fullname:
        <input type="text" id="name" name="name" class="form-control">
        </div>
        <div class="row col-md-6">
        <label for ="date_of_birth">Date of Birth:
        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
        </div>
        <div class="row col-md-6">
        <label for ="email">Email:
        <input type="email" id="email" name="email" class="form-control"> 
        </div>
        <div class="row col-md-6">
        <label for ="password">Password:
        <input type="password" id="password" name="password" class="form-control"> 
        </div>
        <br>
        <div class="row col-md-4 offset-1">
        <input type="submit" class= "btn btn-secondary" value='Submit' name='submit' id="submit">
        </div>
        </form>
</div>
        </div>
      </div>
</body>
<script>
   <script/>

</html> 