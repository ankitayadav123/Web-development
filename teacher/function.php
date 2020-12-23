<?php
function fileupload($file,$dir){
	$target_dir = $dir;
	$target_user_file = $target_dir . basename($file["name"]);
	$imageFileType = strtolower(pathinfo($target_user_file,PATHINFO_EXTENSION));
	$uploadOk = 1;
	$file_name=md5(uniqid(rand(), true)).".".$imageFileType;
	$target_file = $target_dir . $file_name;
	if (file_exists($target_file)) {
	  echo "Sorry, file already exists.";
	  $uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	  echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	  if (move_uploaded_file($file["tmp_name"], $target_file)) {
	    return $file_name;
	  } else {
	    return false;
	  }
	}
}
function add_course()
{
	if (isset($_POST['title'])) {
		include("../admin/inc/db.php");
		$imgname=fileupload($_FILES["thumbnail"],"../img/thumbnails/");
		if($imgname){
			$UID=$_SESSION["UID"];
			$name=$_POST["title"];
			$sub_cat_id=$_POST["sub_cat_id"];
			$price=$_POST["price"];
			$discount=$_POST["discount"];
			$decription=$_POST["decription"];
			$level=$_POST["level"];
			try {
			$sql = "INSERT INTO course (name, sub_cat_id,thumbnail,UID,price,discount,decription,level)
			  VALUES ('$name', '$sub_cat_id','$imgname','$UID','$price','$discount','$decription','$level')";
			  $con->exec($sql);
			} catch(PDOException $e) {
			  echo $sql . "<br>" . $e->getMessage();
			}


		}else{
			echo "Error";			
		}
	}

}

function select_cat(){
	include("../admin/inc/db.php");
	$get_cat=$con->prepare("select * from cat");
	$get_cat->execute();
 
	while ($row=$get_cat->fetch(PDO::FETCH_ASSOC)):
	echo"<option value='".$row['cat_name']."'>".$row['cat_name']."</option>";
	endwhile;
}

function select_sub_cat(){
	include("../admin/inc/db.php");
	$get_cat=$con->prepare("select sc.*,cat.cat_name from sub_cat as sc, cat where sc.cat_id=cat.cat_id");
	$get_cat->execute();
 
	while ($row=$get_cat->fetch(PDO::FETCH_ASSOC)):
	echo"<option value='".$row['sub_cat_id']."'>".$row['cat_name']." - ".$row['sub_cat_name']."</option>";
	endwhile;
}


function view_course(){
		include("../admin/inc/db.php");
		$UID=$_SESSION["UID"];
		$get_cat=$con->prepare("select c.*,cat.cat_name, sc.sub_cat_name from course as c,cat, sub_cat as sc WHERE sc.cat_id=cat.cat_id AND c.sub_cat_id=sc.sub_cat_id and c.UID='$UID'");
		$get_cat->execute();
		$i=1;
		while ($row=$get_cat->fetch(PDO::FETCH_ASSOC)):
		echo"<tr>
				<td>".$i++."</td>
				<td><img class='thumbnail' src='../img/thumbnails/".$row['thumbnail']."'></td>
				<td>".$row['name']."</td>
				<td>".$row['cat_name']." - ".$row['sub_cat_name']."</td>
				<td>".$row['discount']."</td>
				<td>";
				if($row['discount']){
					echo "<strike>".$row['price']."</strike> ".(($row['price'])-(($row['price'])/($row['discount'])));
				}
				else{
				if(!$row['price']){ echo "Free";}
				else{ echo $row['price'];}}
				echo "</td>
				<td>";
				if ($row['submitted'] && $row['approved'] ) {
					echo "Published";
				}elseif($row['submitted']){
					echo "Pending";
				}else{
					echo "Not submitted";
				}
				echo "</td>
				<td><a href='addlec.php?id=".$row["CID"]."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></td>
				<td><a href='index.php?submit=".$row["CID"]."'><i class='fa fa-check-circle' aria-hidden='true'></i></a></td>
			 </tr>";
		endwhile;
	}

function view_lectures(){
		include("../admin/inc/db.php");
		$CID=$_GET["id"];
		$get_cat=$con->prepare("select * from lectures where CID='$CID'");
		$get_cat->execute();
		$i=1;
		while ($row=$get_cat->fetch(PDO::FETCH_ASSOC)):
		echo"<tr>
				<td>".$i++."</td>
				<td>".$row['title']."</td>
				<td> <video height='150' controls>
				  <source src='../video/".$row['video']."' type='video/mp4'>
				  Your browser does not support the video tag.
				</video> </td>
				<td>".$row['lec_no']."</td>
			</tr>";
		endwhile;
	}

function add_lectures()
{
	if (isset($_POST['title'])) {
		include("../admin/inc/db.php");
		$videoname=fileupload($_FILES["video"],"../video/");
		if($videoname){
			$title=$_POST["title"];
			$lec_no=$_POST["lec_no"];
			$CID=$_GET["id"];

			try {
			$sql = "INSERT INTO lectures (CID,title,video, lec_no)
			  VALUES ('$CID', '$title','$videoname','$lec_no')";
			  $con->exec($sql);

			} catch(PDOException $e) {
			  echo $sql . "<br>" . $e->getMessage();
			}


		}else{
			echo "Error";			
		}
	}

}
function submit_course(){
	if (isset($_GET['submit'])) {
		include("../admin/inc/db.php");
		$CID=$_GET["submit"];
		try {
		$sql = "UPDATE course SET submitted=1 WHERE CID='$CID'";
		  $con->exec($sql);
		} catch(PDOException $e) {
		  echo $sql . "<br>" . $e->getMessage();
		}
	}
}
function view_total_fees(){
	include("../admin/inc/db.php");
	$UID=$_SESSION["UID"];
	$get_cat=$con->prepare("select COALESCE(SUM(price),0) as price from enrolled WHERE `TID`='$UID'");
	$get_cat->execute();
	$row=$get_cat->fetch(PDO::FETCH_ASSOC);
	echo ceil(((40)/100)*($row["price"]));
}
function view_fees(){
	include("../admin/inc/db.php");
	$UID=$_SESSION["UID"];
	$get_cat=$con->prepare("select COALESCE(SUM(e.price),0) as total,COUNT(e.EID) as enrolled_num,e.price,c.name,c.thumbnail from enrolled as e, course as c WHERE e.CID=c.CID and `TID`='$UID' GROUP BY e.CID");
	$get_cat->execute();
	$i=1;
	while($row=$get_cat->fetch(PDO::FETCH_ASSOC)):
		echo"<tr>
			<td>".$i++."</td>
			<td><img class='thumbnail' src='../img/thumbnails/".$row['thumbnail']."'></td>
			<td>".$row['name']."</td>
			<td>".$row['price']."</td>
			<td>".$row['enrolled_num']."</td>
			<td>".((40)/100)*($row['price'])."</td>
			<td>".((40)/100)*($row['total'])."</td>
		</tr>";
	endwhile;

}
?>