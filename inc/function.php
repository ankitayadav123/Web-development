<?php 
function view_search_course(){
		include("admin/inc/db.php");
  if (isset($_GET["s"])) {
    $search=$_GET["s"];
    $get_cat=$con->prepare("select c.*,cat.cat_name, sc.sub_cat_name,u.fname,u.lname from course as c,cat, sub_cat as sc, signup_user as u WHERE sc.cat_id=cat.cat_id AND c.sub_cat_id=sc.sub_cat_id AND c.UID=u.UID AND c.submitted=1 and c.approved=1 AND c.name LIKE '%$search%' ");
    $get_cat->execute();
    if ($get_cat->rowCount() > 0) {

    while ($row=$get_cat->fetch(PDO::FETCH_ASSOC)):
      echo '<div class="card wow fadeInUp"><a href="signup.php">
        <img class="card-img-top" src="img/thumbnails/'.$row['thumbnail'].'" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">'.$row['name'].'</h5>
        <p class="card-text">'.$row['cat_name']." - ".$row['sub_cat_name'].'<br>By '.$row['fname'].' '.$row['lname'].'</p>';
      if($row['discount']){
          echo "<h4><span class='badge badge-warning'><b> &#8377;".(($row['price'])-(($row['price'])/($row['discount'])))."</b></span></h4><strike> &#8377;".$row['price']."</strike>";
        }
        else{
        if(!$row['price']){ echo "<h4><span class='badge badge-warning'>Free</span></h4>";}
        else{ echo "<h4><span class='badge badge-warning'> &#8377;".$row['price']."</span></h4>";}}
    echo '</div></a></div>';
    endwhile;
    return true;
    }else{
      return false;
    }
  }


}



 ?>