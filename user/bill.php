<?php 
session_start();
require_once "inc/function.php"; 
if (!isset($_SESSION["logedIn"])) {
  header('Location: ../login.php');
}
if($_SESSION["level"]!="student"){  
  header('Location: ../login.php');
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
      hr.solid {border-top: 3px solid #bbb;}
      table {
          border-collapse: collapse;
        width: 100%;
          }

          th, td {
          padding: 8px;
          text-align: left;
          border-bottom: 1px solid #ddd;
        }

    </style>
</head>
<body> 

<?php include 'inc/header.php'; ?>


<?php echo enrole_course();?>

 <div class="modal-dialog text-center">
    <div class="col-sm-9 main-section">
      <div class="modal-content" style="background-color: #fff;">

        <div class="col-12 user-img">
          <img src="img/bill1.svg">
        </div>
        <div class="col-12 form-input">
          <hr class="solid">
            <?php echo show_bill(); ?>
            
        </div>

      </div>
    </div>
  </div>

<?php include 'inc/footer.php'; ?>


<script type="text/javascript" src="../js/wow.min.js"></script>
          <script>
              new WOW().init();
              </script>



     <!---Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>
