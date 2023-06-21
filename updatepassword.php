<?php
require 'User.php';
session_start();

$msg = "";
if(isset($_GET['submit'])){
 
    $data = $_GET;
    $email =  $_SESSION['email'];
    $oldpassword = $data["oldpassword"];
    $newpassword = $data["newpassword"];
    $confirmpassword = $data["confirmpassword"];

    $user = new user();
    $checkpassword = $user->usersinfo_get($email,$oldpassword);
  

    if(!is_array($checkpassword) || $oldpassword != $checkpassword['password']){
      $msg = "<div class='alert alert-danger'>Old password dosen't match!</div>";

   
    }elseif($newpassword == "" || $confirmpassword == ""){
      $msg = "<div class='alert alert-danger'>password and confirmpassword should not be empty</div>";

    }elseif($newpassword == $confirmpassword){
      $updatepassword = $user->save_password($newpassword);
      $msg ='<div class="alert alert-success">update password successfully!</div>';

 
    }else{ 
     $msg = "<div class='alert alert-danger'>Confirm password dosen't match!</div>";
    
     }
 }
?>
<head>
<title>Update Password</title>
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
   <div class=" mt-4 mb-4 col-md-6 offset-3" style="background-color:lightblue" >
   <form action="updatepassword.php" method="GET" enctype="multipart/form-data" id="form">
   <div class="row col-md-8 mt-4 offset-2">
   <label for ="oldpassword">Old Password:
    <input type="password" id="oldpassword" name="oldpassword" class="form-control">
    </div>
    <div class="row col-md-8 offset-2">
    <label for ="newpassword">New Password:
    <input type="password" id="newpassword" name="newpassword" class="form-control">
    <p class="text-danger" id="valid-newpassword"></p>
     </div>
    <div class="row col-md-8 offset-2">
    <label for ="confirmpassword">Confirm Password:
    <input type="password" id="confirmpassword" name="confirmpassword" class="form-control"> 
    <p class="text-danger" id="valid-confirmpassword"></p>
     </div></br>
     <div class="row col-md-6 mb-4 offset-3">
     <input type="submit"class= "btn btn-primary" value='Login' name='submit' id="submit">
     </div>
  </form>
</div>
  </div>
      </div>
  
</body>
<script>

//   $(document).ready(function () {

//   $('#form').on('submit',function(e) {
//   e.preventDefault();

//    var $oldpassword = $('#oldpassword').val();
//    var p = '';
//    if($oldpassword == '' ){
//     p = 'Please enter your old password';
//    }
//     $('#valid-oldpassword').text(p);

//    var $newpassword = $('#newpassword').val();
//    var p = '';
//    if($newpassword == '' ){
//     p = 'Please enter valid new password';

//    }else if
//     ($newpassword.length < 8 ){
//     p ='Password should be 8 characters';

//    }else if
//    (!validation($newpassword)){
//     p ='Password should be 8 characters, at least one letter,one upper case, one number and one special character';

//    }
//     $('#valid-newpassword').text(p);

//     var $confirmpassword = $('#confirmpassword').val();
//     var p = '';
//   if($confirmpassword == '' ){
//     p = 'Please enter your newpassword again';
//    }
//     $('#valid-confirmpassword').text(p);



//   });
//     const validation = (password) => {
//       const re = new RegExp("(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z])(?=.*[@#$%^&*]).{8,}");
//       return re.test(password);
//     };
   

// });
  </script>
  </html>