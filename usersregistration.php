<?php
include 'model/User.php';

$msg = ""; 
if(isset($_POST['submit'])){

    $data = $_POST;
     $errors= array();
    
     // Validation 
    if($data['name'] == '' || !preg_match('/[a-zA-Z ]/',$data['name'])){
          echo 'Please enter valid name',
      exit;
      }

      if($data['email'] == ''){
        echo 'Please enter your valid email';
        return false;
      }

       if($data['phone_number'] == ''){
        echo 'Please enter the valid phone_number';
        return false;
      }

        if($data['password'] == ''){
            echo 'Please enter valid password';
            die();
      }elseif
          (!preg_match('/[a-zA-Z ]/',$data['password'])){
            echo 'except in alphabets only';
            die();
       }elseif
           (strlen($data['password']) < 8 ){
            echo 'password should be 8 characters';
            die();
        }

        $data = [
          'name' => $data['name'],
          'email' => $data['email'],
          'phone_number' => $data['phone_number'],
          'password' => $data['password'],
          'date'=> date('y-m-d')
         ];

         $email  = $data["email"];
         $user= new user();
         $dbuser = $user->get_email_by_check($email); // for email = email
        
         
        if(is_array($dbuser) && $dbuser['email'] == $email){
          $msg = '<div class="alert alert-danger">This email is already exist!</div>';
        } else{
              $add_info = $user->add($data); // for data save in database
          $msg ='<div class="alert alert-success">User Successfully Added!</div>';
          }   
        };
       
       ?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Registration Page
</title>
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
   <?php
      if($msg !== ""){ ?>
         <?= $msg ?>
    <?php } ?>
        
    <div class=" mt-4 mb-4 col-md-4 offset-4" style="background-color:lightblue" >
   <form action="usersregistration.php" method="POST" id="form">
   <div class="row col-md-8 mt-4 offset-2">
       
        <label for ="name">Fullname:
        <input type="text" id="name" name="name"class="form-control" >
        </div>
        <div class="row col-md-8 offset-2">
        <label for ="email">Email:
        <input class="form-control" type="email" id="email" name="email">
        </div>
        <div class="row col-md-8 offset-2">
        <label for ="phone_number">Phone_number:
        <input type="text" id="phone_number" name="phone_number" class="form-control"> 
        </div>
        <div class="row col-md-8 offset-2">
        <label for ="password">Password:
        <input type="password" id="password" name="password" class="form-control"> 
        </div>
        <br>
        <div class="row col-md-6 mb-4 offset-3">
        <input type="submit" class= "btn btn-primary" value='submit' name='submit' id="submit">
        </div>
        </form>
</div>
        </div>
      </div>
</body>

</html> 