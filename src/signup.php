<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
  //fetched results
  $uname = $_POST["username"];
  $psw1 = $_POST["password1"];
  $psw2 = $_POST["password2"];

  //dp connectivity
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "user";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

//to check whether username already exist /  registered
  $isPresentsql = "SELECT * FROM `usertable` WHERE username='$uname'";
  $isPresentResult = mysqli_query($conn,$isPresentsql);

//if not present than user can be added
  if(mysqli_num_rows($isPresentResult)==0){
    $insertSql = "INSERT INTO `usertable` (`username`, `password`) VALUES ('$uname', '$psw1')";
    $insertResult = mysqli_query($conn,$insertSql);
    if($insertResult){
      echo "Sign up Successfull";
    }
    else{
      echo "Error Occured, Try Again";
    }
  }
  //else user alreay exist
  else{
    echo "Username Already Exists";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign-up</title>
    <link rel="stylesheet" href="../libraries/bootstrap.min.css" />
    <link rel="stylesheet" href="singup.css">
  </head>
  <body>

    <form method="post" action="signup.php">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input
          type="text"
          class="form-control"
          id="exampleInputEmail1"
          aria-describedby="emailHelp"
          maxlength="11"
          name="username"
          required
          
        />
        <div id="emailHelp" class="form-text">
        </div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input
          type="password"
          class="form-control"
          id="exampleInputPassword1"
          name="password1"
          maxlength="15"
          required
        />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
        <input
          type="password"
          class="form-control"
          id="exampleInputPassword2"
          name="password2"
          maxlength="15"
          required
        />
      </div>
      <button type="submit" class="btn btn-primary">Sign-up</button>
    </form>
    <script src="../libraries/jquery-3.2.1.slim.min.js"></script>
    <script src="../libraries/popper.min.js"></script>
    <script src="../libraries/bootstrap.min.js"></script>
  </body>
</html>
