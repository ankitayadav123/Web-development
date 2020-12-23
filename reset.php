<?php
session_start();
$db = mysqli_connect("localhost","root","","e-learning");
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['pass'])) {
  $password = $_POST['pass'];
  $password2 = $_POST['cpass'];
  $UID=$_POST["id"];
  if ($password==$password2){
    $sql="Update signup_user set password='$password' where UID='$UID'";
    if (mysqli_query($db, $sql)) {
      echo "<script type='text/javascript'>alert('Password has been reset sucessfully');
        window.location='login.php';
        </script>";
    }
  }else{
    $msg="Password and conform password should be same.";
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
     background-image: url("img/bg7.jpg");
     background-size: auto;
    background-attachment: fixed;
      background-position: left;
    background-repeat: no-repeat;
    }
  </style>
</head>
<body>
<?php 
  //include("inc/header.php");
?>
<!--reset  form ------------------------------------------------------------------------------------->
    <div class="modal-dialog text-center">
    <div class="col-sm-9 main-section">
      <div class="modal-content">

        <div class="col-12 user-img">
          <img src="img/face.png">
        </div>

        <div class="col-12 form-input">
      <h3 class="form-title" style="color:#2980b9;font-family: roboto;font-size: 25px;">Reset Password!</h3><br>

          <form method="POST" action="reset.php" onsubmit="return check()">
           <?php
            if (isset($msg)) {
              echo '<div class="alert alert-danger" role="alert">';
              echo $msg;
              echo '</div>';
            }?>
            <div style="text-align: left;color: black;font-family: roboto;font-size: 18px;">Password must contain the following:</div>
              <ul style="text-align: left;color: black;font-family: roboto;font-size: 17px;">
                <li>A <b>lowercase</b> letter</li>
                <li>A <b>capital (uppercase)</b> letter</li>
                <li>A <b>number</b></li>
                <li>Minimum <b>8 characters</b></li>
              </ul>
            
            
            <div class="form-group">
              <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
              <input type="password" id="pass" class="form-control" name="pass" required="required" placeholder="Enter New Password">
            </div>

            <div class="form-group">
              <input type="password" class="form-control" name="cpass" placeholder="Repeat your Password" required="required">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
          </form>
        </div>
        <div class="col-12 forgot">
          <a href="login.php">Get back to Login page </a>
        </div>


      </div>
    </div>
  </div>
  <script type="text/javascript">
    function check() {
      var password=document.getElementById('pass').value;
      var lowerCaseLetters = /[a-z]/g;
      var upperCaseLetters = /[A-Z]/g;
      var numbers = /[0-9]/g;
      
      console.log(fullname);
      if(!fullname.trim().match(letters))
      {
        alert('Please enter alphabets in name ');
        return false;
      }
      if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)))
      {
        alert('Invalid Email');        
        return false;
      }
      if(!(password.match(lowerCaseLetters)) || !(password.match(upperCaseLetters)) || !(password.match(numbers)) || !(password.length >= 8)) { 
        alert('Invalid Password');                
        return false;
      }

    }
  </script>
</body>
</html>
