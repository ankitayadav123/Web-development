<?php
session_start();
$db = mysqli_connect("localhost","root","","e-learning");
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["email"]) && isset($_POST["password"])) {
  $email=$_POST["email"];
  $password=$_POST["password"];
  $sql = "SELECT * FROM signup_user WHERE email='".$email."' AND password='".$password."'";
  $result = $db->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["logedIn"]=1;
    $_SESSION["UID"]=$row["UID"];
    $_SESSION["fname"]=$row["fname"];
    $_SESSION["lname"]=$row["lname"];
    $_SESSION["level"]=$row["level"];
    $_SESSION["email"]=$row["email"];
    if ($row["level"]=="admin") {
      header('Location: admin/');
    }
    elseif ($row["level"]=="teacher") {
      header('Location: teacher/');
    }else{
      header('Location: user/');      
    }
  } else {
    $msg="Invalid Email id or Password";
  }
}

?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" href="design/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="design/bootstrap-social/bootstrap-social.css">

  <style type="text/css">
    body{
     background-image: url("img/bg2.jpg");
     background-size: cover;
     background-attachment: fixed;
     background-position: center;
     background-repeat: no-repeat;

    }
  </style>
</head>
<body>

<!--<?php //include 'inc/header.php'; ?><br><br><br> -->
<!--login form ------------------------------------------------------------------------------------->
    <div class="modal-dialog text-center">
    <div class="col-sm-9 main-section">
      <div class="modal-content" style="background-color: #fff;">

        <div class="col-12 user-img">
          <img src="img/face.png">
        </div>

        <div class="col-12 form-input">
          <h3 class="form-title" style="color:#2980b9;font-family: roboto;font-size: 25px;">LOGIN</h3><br>
          
          <form method="POST" action="login.php">
            <?php
            if (isset($msg)) {
              echo '<div class="alert alert-danger" role="alert">';
              echo $msg;
              echo '</div>'; 
            }
            ?>
            <div class="form-group">
              <input type="email" class="form-control" name="email" placeholder="Enter Email" required="required">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password" placeholder="Enter Password" required="
              required">
            </div>
            <button type="submit" class="btn btn-success">Login</button>
          </form>
        </div>

        <div class="col-12 forgot">
          <a href="forgot.php">Forgot Password?</a>
        </div>
        <div class="col-12 signup">
          <a href="signup.php">Don't have an account? Sign up</a>
        </div>

      </div>
    </div>
  </div>

<!--<?php include 'inc/footer.php'; ?>-->

</body>
</html>