<?php

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["username"])){
  $uname = $_POST["username"];
  $psw1 = $_POST["password1"];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "user";
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  $isPresentsql = "SELECT * FROM `usertable` WHERE username='$uname'";
  $isPresentResult = mysqli_query($conn,$isPresentsql);

  //is username present
  if(mysqli_num_rows($isPresentResult)==1){
    $saved_pass = mysqli_fetch_assoc($isPresentResult)["password"];
        if($psw1 == $saved_pass ){ // is password same as stored
          session_start();
          $_SESSION["loggedin"]=true;
          $_SESSION["uname"]=$uname;
          header("Location: main.php");
          exit;
        }
        else{
          echo "Invalid Id or Password";
        }
    }
    else{
      echo "Not Registered";
    }
  }
 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log In</title>
    <link rel="stylesheet" href="../libraries/bootstrap.min.css" />
    <link rel="stylesheet" href="singup.css">
  </head>
  <body>

    <form method="post" action="login.php">
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
      <button type="submit" class="btn btn-primary">Log In</button>
    </form>
    <script src="../libraries/jquery-3.2.1.slim.min.js"></script>
    <script src="../libraries/popper.min.js"></script>
    <script src="../libraries/bootstrap.min.js"></script>
  </body>
</html>