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
<!doctype html> 
<html lang="en">
  <head> 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" href="design/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="design/bootstrap-social/bootstrap-social.css">
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5f3909771803f100118843db&product=sticky-share-buttons" async="async"></script>
<link
    rel="stylesheet"
    href="../css/animate.min.css">
    <title>LearnEd - The better way to learn</title>
  </head>

  <body>
  	<?php include 'inc/header.php'; ?><br><br><br>
    <div>
      <div>
      <h3><!--Recommended for you---></h3>
    </div>
  	       <div class="container">
  		        <?php echo view_course_details();?>
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