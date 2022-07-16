<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Log In</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="singup.css">
</head>


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
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Invalid Id or Password</strong>. Try Again!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
    }
    else{
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>You are Not Registered.</strong> Click <a href="signup.php">here</a> to Regsiter.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
  }
 

?>

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