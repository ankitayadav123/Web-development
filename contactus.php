<?php
  if (isset($_POST["name"])) {
    $name=$_POST["name"];
    $email=$_POST["email"];
    $msg=$_POST["msg"];
    include("admin/inc/db.php");
    try {
      $sql = "INSERT INTO feedback (name, email,msg)
      VALUES ('$name', '$email','$msg')";
      $con->exec($sql);
      echo "<script>alert('Thanks for feedback. HAPPY LEARNING !!!')</script>";
      echo "<script>window.location.replace('index.php');</script>";

    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

  }


?>