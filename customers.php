<?php

// require 'Customer.php';
if(isset($_POST['submit'])){

  $data = $_POST;
   $errors= array();
  
   // Validation 
  if($data['name'] == '' || !preg_match('/[a-zA-Z ]/',$data['name'])){
        echo 'Please enter valid name',
    exit;
    }

  //  if($data['dob'] == ''){
  //     echo 'Please enter your date of birth';
  //    return false;
   
      function validateAge($dob, $age = 18)
      {
          // $birthday can be UNIX_TIMESTAMP or just a string-date.
          if(is_string($dob)) {
            $dob = strtotime($dob);
          }
      
          // check
          // 31536000 is the number of seconds in a 365 days year.
          if(time() - $dob < $age * 31536000)  {
              return false;
          }
      
          return true;
      }

     if($data['email'] == ''){
      echo 'Please enter valid email';
      return false;
     }

    if($data['password'] == ''){
      echo 'Please enter valid password';
      return false;
    }elseif
    (onlyaphabets($data['password'])){
      echo 'password except in alphabets only';
      return false;
    }elseif
      (strlen($data['password']) < 8 ){
      echo 'password should be 8 characters';
      return false;
     };

     // Data Save Process
     $data = [
      'name' => $data['name'],
      'date_of_birth' => $data['date_of_birth'],
      'email' => $data['email'],
      'password' => $data['password'],
      'date'=> date('y-m-d')
      ];
     
      //  $data = ['name'=> $data['name'],'dob' =>$data['dob'], 'email' =>$data['email'],'password' => $data['password']];
      //  $jsondata = json_encode($data);

      //SAve Data
      // $myfile = fopen("customersfile.json", "w") or die("Unable to open file!");
      // fwrite($myfile,$jsondata);
      // fclose($myfile);
      
      // $customer = new customer();
      // $this->add($data);
    }
 

        
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Customer Register</title>
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