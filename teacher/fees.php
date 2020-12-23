<?php session_start(); ?>
<?php require_once "function.php";  ?>
<?php echo add_course(); 
echo submit_course();
if (!isset($_SESSION["logedIn"])) {
  header('Location: ../login.php');
}
if($_SESSION["level"]!="teacher"){  
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
    <link rel="stylesheet" type="text/css" href="index.css">

    <link rel="stylesheet" href="../design/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../design/bootstrap-social/bootstrap-social.css">

    <title>LearnEd - The better way to learn</title>

  </head>
		<div class="navigation">
		      <nav class="navbar navbar-expand-lg navbar-light " style="background-color:#34ace0; width: 100%;" >
		        <a class="navbar-brand"  href="index.php">
		            <img src="../img/logo.png" width="150px" height="45px"  alt="LearnEd" style="padding-left: 25px;padding-bottom: 7px;"></a>

		            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		            <span class="navbar-toggler-icon"></span>
		            </button>


		        <div class="navbar-collapse collapse" id="navbarSupportedContent">
		          <ul class="navbar-nav ml-auto" >

		              <li class="nav-item dropdown">
		                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;padding-right: 95px;font-size: 20px;"><i class="fa fa-user-circle-o" aria-hidden="true">  <?php echo $_SESSION["fname"]." ".$_SESSION["lname"]?></i></a>
		                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		                <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i> Log out</a>
		              </div>
		              </li>              
		            </ul>
		          </div>
		       </nav>
		    </div>


<div class="fees">
  <h2>&#8377; <?php echo view_total_fees();?></h2>
  <p>Total Earned</p>
</div>
    <div id="add">
    <table>
      <tr>
        <th>Sr No.</th>
        <th></th>
        <th>Course</th>
        <th>Course Price</th>
        <th>Enrolled</th>
        <th>Pay per Enroll</th>
        <th>Total</th>
      </tr>
            <?php echo view_fees(); ?>

    </table>

    </div>

  <body>
  	















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>





  </body>
</html>
