<?php
include_once 'config.php';
session_start();
if(isset($_SESSION['customerLogin'])){
  header("Location: search.php");
}

$_ = $_POST;
if(isset($_['email'], $_['password'])){
  $username = trim($_['email']);
  $password = trim($_['password']);
  if($username && $password){   
    $adUser = $db->query('select id,user_pwd from  users where user_email="'.$username.'"')->fetch(PDO::FETCH_OBJ);
    if($adUser && password_verify($password, $adUser->user_pwd)){
      $userLog = new stdClass();
      $userLog->username = $username;
      $userLog->password = $password;
      $_SESSION['customerLogin'] = $userLog;
      header("Location: search.php");
    }else{
      //login error
    }
  }
}

?>
 <!DOCTYPE html>
<html>
   <head>
      <title>Login</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="search.css" >
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      
   </head>
   <body>
      <div class="container">
         <div class="main-heading">
              <div class="col-sm-6">
                 <div class="well col-sm-12">
                    <h2>Login</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                       <div class="form-group">
                          <label class="control-label" for="input-email">E-Mail Address</label>
                          <input type="text" name="email" value="" placeholder="E-Mail Address" id="input-email" class="form-control">
                       </div>
                       <div class="form-group">
                          <label class="control-label" for="input-password">Password</label>
                          <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control">
                         
                       </div>
                       <br><br>
                        <div class="form-group">
                       <input type="submit" value="Login" class="btn btn-primary "> 
                       </div> 
                    </form><br><br>
                   
                   <div class="">
                     <div class="row">
                       <div class="col-sm-12"><strong>Username: </strong>admin@gmail.com</div>
                       <div class="col-sm-12"><strong>password:</strong> qwerty@123</div>
                     </div>
                   </div>
                 </div>
              </div>
           </div>
        </div>


