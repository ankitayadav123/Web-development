<?php
function view_course(){
		include("../admin/inc/db.php");
		$get_cat=$con->prepare("select c.*,cat.cat_name, sc.sub_cat_name,u.fname,u.lname from course as c,cat, sub_cat as sc, signup_user as u WHERE sc.cat_id=cat.cat_id AND c.sub_cat_id=sc.sub_cat_id AND c.UID=u.UID AND c.submitted=1 and c.approved=1");
		$get_cat->execute();
		$i=1;
		while ($row=$get_cat->fetch(PDO::FETCH_ASSOC)):
			echo '<div class="card wow fadeInUp"><a href="description.php?id='.$row['CID'].'">
  			<img class="card-img-top" src="../img/thumbnails/'.$row['thumbnail'].'" alt="Card image cap">
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
}
function view_course_details(){
	if (isset($_GET["id"])) {
		$id=$_GET["id"];
		# code...
		include("../admin/inc/db.php");
		$get_cat=$con->prepare("select c.*,cat.cat_name, sc.sub_cat_name,u.fname,u.lname,(SELECT COUNT(l.LID) FROM lectures as l WHERE l.CID=c.CID) as lectures from course as c,cat, sub_cat as sc, signup_user as u WHERE sc.cat_id=cat.cat_id AND c.sub_cat_id=sc.sub_cat_id AND c.UID=u.UID AND c.submitted=1 AND c.CID='$id'");
		$get_cat->execute();
		$row=$get_cat->fetch(PDO::FETCH_ASSOC);
		echo '<div class="course-desciption-holder">
  			       <div class="upper">
                <div class="lhs">
                  <div class="course-img">
                    <img src="../img/thumbnails/'.$row['thumbnail'].'">
                  </div>
                </div>
                <div class="rhs">
                  <div class="course-details">
                    <div class="course-title">'.$row['name'].'</div>
                    <table class="course-details-list">
                      <tr>
                        <td class="course-details-name">Instructor :</td>
                        <td>'.$row['fname'].' '.$row['lname'].'</td>
                      </tr>
                      <tr>
                        <td class="course-details-name">Category :</td>
                        <td>'.$row['cat_name'].' - '.$row['sub_cat_name'].'</td>
                      </tr>
                      <tr>
                        <td class="course-details-name">Level :</td>
                        <td>'.$row['level'].'</td>
                      </tr>
                      <tr>
                        <td class="course-details-name">Lectures :</td>
                        <td>'.$row['lectures'].'</td>
                      </tr>
                    </table>
                    <div class="course-price-details">
                    ';
			if($row['discount']){
				$discount=$row['discount'];
				$price=$row['price'];
				$selling_price=(($price)-(($price)/($discount)));
				$saving=$price-$selling_price;
					echo '<span class="price">Price : &#8377;'.$selling_price.'</span>
                      <span class="mrp">&#8377;'.$price.'</span>
                      <span class="discount">'.$discount.'%</span>
                      <span class="saving">saving &#8377;'.$saving.'</span>';
				}
				else{
				if(!$row['price']){ echo '<span class="price">Free</span>';}
				else{ echo '<span class="price">Price : &#8377;'.$row['price']."</span>";}}
                      echo '</div>
                      <a class="btn btn-success btn-lg btn-block buy-now" href="bill.php?id='.$id.'" role="button"">Buy now</a>

                  </div>
                </div> 
               </div>
               <hr>
               <div class="description-holder">'.$row['decription'].'
               </div>  
              </div>';

	}
}
function enrole_course(){
  if (isset($_GET["enrole"])) {
    $id=$_GET["enrole"];
    $price=$_POST["price"];
    $TID=$_GET["tid"];
    $UID=$_SESSION["UID"];
    include("../admin/inc/db.php");
    try {
      $sql = "INSERT INTO enrolled (CID, UID,price,TID)
      VALUES ('$id', '$UID','$price','$TID')";
      $con->exec($sql);
      echo "<script>alert('Thanks for Enrolling in the course. HAPPY LEARNING !!!')</script>";
      echo "<script>window.location.replace('mycourses.php');</script>";

    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

  }
}
function show_bill(){
  if (isset($_GET["id"])) {
  $id=$_GET["id"];
    include("../admin/inc/db.php");
    $get_cat=$con->prepare("select c.*,cat.cat_name, sc.sub_cat_name,u.fname,u.lname,(SELECT COUNT(l.LID) FROM lectures as l WHERE l.CID=c.CID) as lectures from course as c,cat, sub_cat as sc, signup_user as u WHERE sc.cat_id=cat.cat_id AND c.sub_cat_id=sc.sub_cat_id AND c.UID=u.UID AND c.submitted=1 AND c.CID='$id'");
    $get_cat->execute();
    $row=$get_cat->fetch(PDO::FETCH_ASSOC);
    $final_price=0;
    $saving=0;
          if($row['discount']){
        $discount=$row['discount'];
        $price=$row['price'];
        $selling_price=(($price)-(($price)/($discount)));
        $final_price=$selling_price;
        $saving=$price-$selling_price;
        }
        else{
          $final_price=$row['price'];
        if(!$row['price']){$price=0;}
        else{$price=$row['price'];}}
    echo '
<div class="form-group">
                <table>     
                    
                    <tr>
                      <td>Original price :</td>
                      <td>&#8377;'.$price.'</td>
                    </tr>
                    <tr>
                      <td>Discount price :</td>
                      <td>&#8377;'.$saving.'</td>
                    </tr>
                    <tr>
                      <td><b>Total :</b></td>
                      <td><b>&#8377;'.$final_price.'</b></td>
                    </tr>
                </table><br>
                <p style="text-align: left;"><i class="fa fa-caret-right" aria-hidden="true"></i> LearnEd is required by law to collect applicable transaction taxes for purchases made in certain tax jurisdictions.</p>
                <p style="text-align: left;"><i class="fa fa-caret-right" aria-hidden="true"></i> By completing your purchase you agree to these <b>Terms of Service.</b></p>  
            </div>          <hr class="solid">
<form action="?enrole='.$row['CID'].'&tid='.$row['UID'].'" method="post">
      <input value="';
      $price=0;
      if($row['discount']){
        $price=$selling_price;
        echo $selling_price;
      }else{
        if(!$row['price']){ echo "0";}
        else{
          echo $row['price'];
          $price=$row['price'];
        }
      }
      echo '" name="price" type="hidden">

    <button type="submit" class="btn btn-success">Pay</button>
      </form>
';
  }
}
function view_mycourse(){
    include("../admin/inc/db.php");
    $UID=$_SESSION["UID"];
    $get_cat=$con->prepare("select c.*,u.fname,u.lname from course as c,signup_user as u, enrolled as e WHERE e.CID=c.CID AND e.UID='$UID' AND c.UID=u.UID");
    $get_cat->execute();
    while ($row=$get_cat->fetch(PDO::FETCH_ASSOC)):
      echo '<div class="card wow fadeInUp">
        <img class="card-img-top" src="../img/thumbnails/'.$row['thumbnail'].'" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">'.$row['name'].'</h5>';
        echo '<p class="card-text">By '.$row['fname'].' '.$row['lname'].'</p>';
        echo '<a class="btn btn-primary " href="video.php?id='.$row['CID'].'" role="button">Start</a>';
    echo '</div></div>';
    endwhile;
}
function view_lecture(){
  include("../admin/inc/db.php");
  if (isset($_GET["id"])) {
    $cid=$_GET["id"];
    if (isset($_GET["lid"])) {
      $lid=$_GET["lid"];
      $get_lecture=$con->prepare("SELECT * from lectures WHERE CID='$cid' AND LID='$lid'");
    }else{
      $get_lecture=$con->prepare("SELECT * from lectures WHERE CID='$cid' ORDER BY lec_no LIMIT 1");
    }
    $get_lecture->execute();
    $row=$get_lecture->fetch(PDO::FETCH_ASSOC);
    echo '<h1 class="lecture-title">'.$row["title"].'</h1>
    <video width="100%" height="100%" controls style="border:1px solid #95a5a6;">
        <source src="../video/'.$row["video"].'" type="video/mp4" >
    </video>';
  }
}
function view_lectures_list(){
  include("../admin/inc/db.php");
  if (isset($_GET["id"])) {
    $cid=$_GET["id"];
    $get_lecture=$con->prepare("SELECT * from lectures WHERE CID='$cid' ORDER BY lec_no");
    $get_lecture->execute();
    while($row=$get_lecture->fetch(PDO::FETCH_ASSOC)):
      echo '<li><a href="?id='.$cid.'&lid='.$row["LID"].'"';
      if (isset($_GET["lid"])) {
        if ($_GET["lid"]==$row["LID"]) {
          echo " class='active'";
        }
      }
      echo '>'.$row["lec_no"].'. '.$row["title"].'</a></li>';
    endwhile;

  }
}
  function view_cat(){
    include("../admin/inc/db.php");
    $get_cat=$con->prepare("select * from cat order by cat_name");
    $get_cat->execute();
    while ($row=$get_cat->fetch(PDO::FETCH_ASSOC)):
      echo '<a class="dropdown-item" href="viewcat.php?id='.$row['cat_id'].'">'.$row['cat_name'].'</a>';
    endwhile;
  }
function view_cat_course(){
  include("../admin/inc/db.php");
  if (isset($_GET["id"])) {
    $cid=$_GET["id"];
    $get_cat=$con->prepare("select c.*,cat.cat_name, sc.sub_cat_name,u.fname,u.lname from course as c,cat, sub_cat as sc, signup_user as u WHERE sc.cat_id=cat.cat_id AND c.sub_cat_id=sc.sub_cat_id AND cat.cat_id=$cid AND c.UID=u.UID AND c.submitted=1 and c.approved=1");
    $get_cat->execute();
    while ($row=$get_cat->fetch(PDO::FETCH_ASSOC)):
      echo '<div class="card wow fadeInUp"><a href="description.php?id='.$row['CID'].'">
        <img class="card-img-top" src="../img/thumbnails/'.$row['thumbnail'].'" alt="Card image cap">
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
  }
}
function view_search_course(){
  include("../admin/inc/db.php");
  if (isset($_GET["s"])) {
    $search=$_GET["s"];
    $get_cat=$con->prepare("select c.*,cat.cat_name, sc.sub_cat_name,u.fname,u.lname from course as c,cat, sub_cat as sc, signup_user as u WHERE sc.cat_id=cat.cat_id AND c.sub_cat_id=sc.sub_cat_id AND c.UID=u.UID AND c.submitted=1 and c.approved=1 AND c.name LIKE '%$search%' ");
    $get_cat->execute();
    if ($get_cat->rowCount() > 0) {

    while ($row=$get_cat->fetch(PDO::FETCH_ASSOC)):
      echo '<div class="card wow fadeInUp"><a href="description.php?id='.$row['CID'].'">
        <img class="card-img-top" src="../img/thumbnails/'.$row['thumbnail'].'" alt="Card image cap">
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
function view_course_name(){
  include("../admin/inc/db.php");
  if (isset($_GET["id"])) {
    $cid=$_GET["id"];
    $get_cat=$con->prepare("select cat_name from cat WHERE cat_id=$cid");
    $get_cat->execute();
    $row=$get_cat->fetch(PDO::FETCH_ASSOC);
    echo $row['cat_name'];
  }

}
?>