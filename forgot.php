<?php 
  include("admin/inc/db.php");
  if (isset($_POST["email"])) {
    $email=$_POST["email"];
    $answer=$_POST["answer"];

    $sql = "select * from signup_user where email='".$email."' AND answer='".$answer."'";
    $result = $con->query($sql);

    if ($result->rowCount() > 0) {
      $row = $result->fetch(PDO::FETCH_ASSOC);
          header('Location: reset.php?id='.$row["UID"]);
    }else{
        $msg="Incorrect Email id or answer";
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
     background-image: url("img/bg4.png");
     background-size: auto;
      //background-attachment: fixed;
      background-position: left;
    background-repeat: no-repeat;
    }
  </style>
</head>
<body>
<?php 
  //include("inc/header.php");
?>
<!--forgot ------------------------------------------------------------------------------------->
    <div class="modal-dialog text-center">
    <div class="col-sm-9 main-section">
      <div class="modal-content">

        <div class="col-12 user-img">
          <img src="img/face.png">
        </div>
        <div class="col-12 form-input">
          <h3 class="form-title" style="color:#c0392b;font-family: roboto;font-size: 25px;">Forgot Password ?</h3><br>
          <form action="forgot.php" method="post">
            <?php
            if (isset($msg)) {
              echo '<div class="alert alert-danger" role="alert">';
              echo $msg;
              echo '</div>';
            }
            ?>
              <div class="form-group">
              <input type="email" name="email" class="form-control" placeholder="Enter Email" required="required"><br>
                <label style="color:#000;text-align: left;display: block;font-family: roboto;font-size: 20px;">Security Question:<br> What is your Dream Job ?</label><br>
              <input type="text" class="form-control" name="answer" placeholder="Enter Answer" required="required">
              </div>
              <button type="submit" class="btn btn-danger">Reset</button>
          </form>
        </div>

        <div class="col-12 forgot">
          <a href="login.php">Get back to Login page </a>
        </div>

        </div>
    </div>
  </div>



</body>
</html>