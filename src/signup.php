<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign-up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="singup.css">
</head>



<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
  $isPresentResult = mysqli_query($conn, $isPresentsql);

  //if not present than user can be added
  if (mysqli_num_rows($isPresentResult) == 0) {
    $insertSql = "INSERT INTO `usertable` (`username`, `password`) VALUES ('$uname', '$psw1')";
    $insertResult = mysqli_query($conn, $insertSql);
    if ($insertResult) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Registration Complete. </strong> Click <a href="login.php">here</a> to Login.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    } else {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Try Again!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
  }
  //else user alreay exist
  else {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Username Already Registered</strong> Click <a href="login.php">here</a> to Login.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
}
?>


<body>
  <form method="post" action="signup.php">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Username</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" maxlength="11" name="username" required />
      <div id="emailHelp" class="form-text">
      </div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password1" maxlength="15" required />
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
      <input type="password" class="form-control" id="exampleInputPassword2" name="password2" maxlength="15" required />
    </div>
    <button type="submit" class="btn btn-primary">Sign-up</button>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>