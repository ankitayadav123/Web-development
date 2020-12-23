<?php

// To veiw Category in Categories Section -----------------------------------------------------------------//

	function view_cat(){
		include("inc/db.php");
		$get_cat=$con->prepare("select * from cat order by cat_name");
		$get_cat->execute();
		$i=1;
		while ($row=$get_cat->fetch(PDO::FETCH_ASSOC)):
		echo"<tr>
				<td>".$i++."</td>
				<td>".$row['cat_name']."</td>
				<td><a href='index.php?cat&edit_cat=".$row['cat_id']."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></td>
				<td><a href='index.php?cat&del_cat=".$row['cat_id']."'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
			 </tr>";
		endwhile;

		if(isset($_GET['del_cat'])){
			$id=$_GET['del_cat'];

			$del=$con->prepare("delete from cat where cat_id='$id'");
			if($del->execute()){
				$del2=$con->prepare("delete from sub_cat where cat_id='$id'");
				if($del2->execute()){
					echo "<script>alert('Category and sub categories deleted Successfully')</script>";
					echo "<script>window.open('index.php?cat','_self')</script>";
				}else{
					echo "<script>alert('Sub Category deleted Successfully')</script>";
					echo "<script>window.open('index.php?cat','_self')</script>";

				}
			}
			else{
				echo "<script>alert('Category deleted Successfully')</script>";
				echo "<script>window.open('index.php?cat','_self')</script>";
			}
		}
	}

	// function for adding categories section ------------------------------------------------------------//

	function add_cat(){ 
		include("db.php");
		if (isset($_POST['add_cat'])) {
			$cat_name=$_POST['cat_name'];

			$check=$con->prepare("select * from cat where cat_name='$cat_name' Order By cat_name");
			$check->setFetchMode(PDO:: FETCH_ASSOC);
			$check->execute();
			$count=$check->rowCount();

			if ($count==1) {
				echo "<script>alert('Category Already Added')</script>";
				echo "<script>window.location('index.php?cat','_self')</script>";
			}
			else{
				$add_cat=$con->prepare("insert into cat(cat_name)values('$cat_name')");

				if ($add_cat->execute()) {
					echo "<script>alert('Category Successfully Added')</script>";
					echo "<script>window.location('index.php?cat','_self')</script>";
				}
				else{
					echo "<script>alert('Category not Successfully Added')</script>";
					echo "<script>window.location('index.php?cat','_self')</script>";
				}
			}
			
		}
	}

	// function for editing categories section------------------------------------------------------------- //

		function edit_cat(){ 
		include("db.php");
		if (isset($_GET['edit_cat'])) {
			$id=$_GET['edit_cat'];

			$get_cat=$con->prepare("select * from cat where cat_id='$id'");
			$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat->execute();
			$row=$get_cat->fetch();

			echo "<h3>Edit Categories </h3>
			<form id='edit_form' method='post' enctype='multipart/form-data'>
				<input type='text' name='cat_name' value='".$row['cat_name']."' placeholder='Enter Category' required='required' />
				<center><button name='edit_cat'>Edit Category</button></center>
			</form>";

			if(isset($_POST['edit_cat'])){
				$cat_name=$_POST['cat_name'];

				$check=$con->prepare("select * from cat where cat_name='$cat_name' Order By cat_name");
				$check->setFetchMode(PDO:: FETCH_ASSOC);
				$check->execute();
				$count=$check->rowCount();

			if ($count==1) {
				echo "<script>alert('Category Already Added')</script>";
				echo "<script>window.open('index.php?cat','_self')</script>";
			}

			else{
				$up=$con->prepare("update cat set cat_name='$cat_name' where cat_id='$id'");

				if ($up->execute()) {
					echo "<script>alert('Category Updated Successfully')</script>";
					echo "<script>window.open('index.php?cat','_self')</script>";
				}
				else{
					echo "<script>alert('Category not Updated Successfully')</script>";
					echo "<script>window.open('index.php?cat','_self')</script>";
				}
			
			}
			}
		}
	}




//-----------------------------Functions For Sub Categories Section---------------------------------//

	// To veiw Category in Sub Categories Section //

	function view_sub_cat(){
		include("inc/db.php");
		$get_cat=$con->prepare("select sc.*,c.cat_name from sub_cat AS sc,cat AS c where c.cat_id=sc.cat_id order by c.cat_name ASC,sc.sub_cat_name ASC");
		$get_cat->execute();
		$i=1;
		while ($row=$get_cat->fetch(PDO::FETCH_ASSOC)):
		$id=$row['cat_id'];
		echo"<tr>
				<td>".$i++."</td>
				<td>".$row['cat_name']."</td>
				<td>".$row['sub_cat_name']."</td>
				<td><a href='index.php?sub_cat&edit_sub_cat=".$row['sub_cat_id']."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></td>
				<td><a href='index.php?sub_cat&del_sub_cat=".$row['sub_cat_id']."'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
			 </tr>";
		endwhile;

		if(isset($_GET['del_sub_cat'])){
			$id=$_GET['del_sub_cat'];

			$del=$con->prepare("delete from sub_cat where sub_cat_id='$id'");
			if($del->execute()){
				echo "<script>alert('Sub Category deleted Successfully')</script>";
				echo "<script>window.open('index.php?sub_cat','_self')</script>";
			}
			else{
				echo "<script>alert('Sub Category deleted Successfully')</script>";
				echo "<script>window.open('index.php?sub_cat','_self')</script>";
			}
		}
	}


	//Function for adding sub categories section //

	function add_sub_cat(){ 
		include("db.php");
		if (isset($_POST['add_sub_cat'])) {
			$cat_name=$_POST['sub_cat_name'];
			$cat_id=$_POST['cat_id'];
			$check=$con->prepare("select * from sub_cat where sub_cat_name='$cat_name'");
			$check->setFetchMode(PDO:: FETCH_ASSOC);
			$check->execute();
			$count=$check->rowCount();

			if ($count==1) {
				echo "<script>alert('Sub Category Already Added')</script>";
				echo "<script>window.location('index.php?sub_cat','_self')</script>";
			}
			else{
				$add_cat=$con->prepare("insert into sub_cat(sub_cat_name,cat_id)values('$cat_name','$cat_id')");

				if ($add_cat->execute()) {
					echo "<script>alert('Sub Category Successfully Added')</script>";
					echo "<script>window.location('index.php?sub_cat','_self')</script>";
				}
				else{
					echo "<script>alert('Sub Category not Successfully Added')</script>";
					echo "<script>window.location('index.php?sub_cat','_self')</script>";
				}
			}
			
		}
	}

	// function for editing categories section //

		function edit_sub_cat(){ 
		include("db.php");
		if (isset($_GET['edit_sub_cat'])) {
			$id=$_GET['edit_sub_cat'];

			$get_cat=$con->prepare("select * from sub_cat where sub_cat_id='$id'");
			$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat->execute();
			$row=$get_cat->fetch();

			echo "<h3>Edit Sub Categories </h3>
			<form id='edit_form' method='post' enctype='multipart/form-data'>
				<input type='text' name='sub_cat_name' value='".$row['sub_cat_name']."' placeholder='Enter Category' required='required' />
				<center><button name='edit_sub_cat'>Edit Category</button></center>
			</form>";

			if(isset($_POST['edit_sub_cat'])){
				$cat_name=$_POST['sub_cat_name'];

				$check=$con->prepare("select * from sub_cat where sub_cat_name='$cat_name' Order By cat_name");
				$check->setFetchMode(PDO:: FETCH_ASSOC);
				$check->execute();
				$count=$check->rowCount();

			if ($count==1) {
				echo "<script>alert('Sub Category Already Added')</script>";
				echo "<script>window.open('index.php?sub_cat','_self')</script>";
			}

			else{
				$up=$con->prepare("update sub_cat set sub_cat_name='$cat_name' where sub_cat_id='$id'");

				if ($up->execute()) {
					echo "<script>alert('Sub Category Updated Successfully')</script>";
					echo "<script>window.open('index.php?sub_cat','_self')</script>";
				}
				else{
					echo "<script>alert('Category not Updated Successfully')</script>";
					echo "<script>window.open('index.php?sub_cat','_self')</script>";
				}
			
			}
			}
		}
	}




	// to retrive data //

	function select_cat(){
		include("inc/db.php");
		$get_cat=$con->prepare("select * from cat");
		$get_cat->execute();

		while ($row=$get_cat->fetch(PDO::FETCH_ASSOC)):
		echo"<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
		endwhile;
	}

			/* function for contact page*/
	function contact(){
		include ("inc/db.php");
		$get_con=$con->prepare("select * from contact");
		$get_con->setFetchMode(PDO:: FETCH_ASSOC);
		$get_con->execute();
		$row=$get_con->fetch();

		echo "<form method='post' enctype='multipart/form-data'>
			<table>
				<tr>
					<td>Update contact number</td>
					<td><input type='tel' value='".$row['phn']."' name='phn'></td>
				</tr>
				<tr>
					<td>Update Email</td>
					<td><input type='email' value='".$row['email']."' name='email'></td>
				</tr>
				<tr>
					<td>Update Office Address 1</td>
					<td><input type='text' value='".$row['add1']."' name='add1'></td>
				</tr>
				<tr>
					<td>Update Office Address 2</td>
					<td><input type='text' value='".$row['add2']."' name='add2'></td>
				</tr>
				<tr>
					<td>Update Facebook Address</td>
					<td><input type='text' value='".$row['fb']."' name='fb'></td>
				</tr>
				<tr>
					<td>Update Google+ Address</td>
					<td><input type='text' value='".$row['gp']."' name='gp'></td>
				</tr>
				<tr>
					<td>Update Linkedin Address</td>
					<td><input type='text' value='".$row['ln']."' name='ln'></td>
				</tr>
				<tr>
					<td>Update Twitter Address</td>
					<td><input type='text' value='".$row['tw']."' name='tw'></td>
				</tr>
				
			</table>
			<center><button name='up_con'>Save</button></center>
		</form>";

		/*update data in contact page*/

		if (isset($_POST['up_con'])) {
			$phn=$_POST['phn'];
			$email=$_POST['email'];
			$add1=$_POST['add1'];
			$add2=$_POST['add2'];
			$fb=$_POST['fb'];
			$gp=$_POST['gp'];
			$ln=$_POST['ln'];
			$tw=$_POST['tw'];

			$up=$con->prepare("update contact set phn='$phn',email='$email',add1='$add1',add2='$add2',fb='$fb',gp='$gp',ln='$ln',tw='$tw'");
				if ($up->execute()) {
					echo "<script>alert('Changes Saved Successfully')</script>";
					echo "<script>window.open('index.php?contact','_self')</script>";
				}
				else{
					echo "<script>alert('Changes Not Saved Successfully')</script>";
					echo "<script>window.open('index.php?contact','_self')</script>";
				}	
			}

	}


	/*Function for FAQs page */
	function add_faqs(){ 
		include("db.php");
		if (isset($_POST['add_faqs'])) {
			$ques=$_POST['ques'];
			$ans=$_POST['ans'];

			$check=$con->prepare("select * from faqs where ques='$ques'");
			$check->setFetchMode(PDO:: FETCH_ASSOC);
			$check->execute();
			$count=$check->rowCount();

			if ($count==1) {
				echo "<script>alert('FAQs Already Added')</script>";
				echo "<script>window.location('index.php?FAQs','_self')</script>";
			}
			else{
				$add_cat=$con->prepare("insert into faqs(ques,ans)values('$ques','$ans')");

				if ($add_cat->execute()) {
					echo "<script>alert('FAQs Successfully Added')</script>";
					echo "<script>window.location('index.php?faqs','_self')</script>";
				}
				else{
					echo "<script>alert('FAQs not Successfully Added')</script>";
					echo "<script>window.location('index.php?faqs','_self')</script>";
				}
			}
			
		}
	}



	function view_std(){
		include("inc/db.php");
		$get_cat=$con->prepare("select u.*,(select COUNT(*) from enrolled as e where e.UID=u.UID) as enrolled_num from signup_user as u where level='student' order by fname ");
		$get_cat->execute();
		$i=1;
		while ($row=$get_cat->fetch(PDO::FETCH_ASSOC)):
		echo"<tr>
				<td>".$i++."</td>
				<td>".$row['fname'].' '.$row['lname']."</td>
				<td>".$row['email']."</td>
				<td>".$row['enrolled_num']."</td>
				";
		endwhile;

	}

	function view_teacher(){
		include("inc/db.php");
		$get_cat=$con->prepare("select u.*,(select COUNT(*) from course as c where c.submitted=1 and c.UID=u.UID) as published, (select COALESCE(SUM(e.price),0) from enrolled as e where u.UID=e.TID) as price from signup_user as u where level='teacher' ORDER BY fname ");
		$get_cat->execute();
		$i=1;
		while ($row=$get_cat->fetch(PDO::FETCH_ASSOC)):
		echo"<tr>
				<td>".$i++."</td>
				<td>".$row['fname'].' '.$row['lname']."</td>
				<td>".$row['email']."</td>
				<td>&#8377;".((40)/100)*($row['price'])."</td>
				<td>".$row['published']."</td>
				";
		endwhile;

	}
	function view_active_courses(){
		include("inc/db.php");
		$get_cat=$con->prepare("select c.name,c.thumbnail,(select COUNT(*) from lectures as l where l.CID=c.CID) as lectures_num,(SELECT COALESCE(SUM(e.price),0) from enrolled as e WHERE e.CID=c.CID) as price,u.fname,u.lname from course as c, signup_user as u where c.submitted=1 and c.approved=1 and u.UID=c.UID");
		$get_cat->execute();
		$i=1;
		while ($row=$get_cat->fetch(PDO::FETCH_ASSOC)):
		echo"<tr>
				<td>".$i++."</td>
				<td><img class='card-img-top' src='../img/thumbnails/".$row['thumbnail']."'/></td>
				<td>".$row['name']."</td>
				<td>".$row['lectures_num']."</td>
				<td>&#8377;".((60)/100)*($row['price'])."</td>
				<td>".$row['fname'].' '.$row['lname']."</td>
				";
		endwhile;

	}
	function view_pending(){
		include("inc/db.php");
		$get_cat=$con->prepare("select c.name,c.thumbnail,c.CID,(select COUNT(*) from lectures as l where l.CID=c.CID) as lectures_num,u.fname,u.lname from course as c, signup_user as u where c.submitted=1 and c.approved=0 and u.UID=c.UID ");
		$get_cat->execute();
		$i=1;
		while ($row=$get_cat->fetch(PDO::FETCH_ASSOC)):
		echo"<tr>
				<td>".$i++."</td>
				<td><img class='card-img-top' src='../img/thumbnails/".$row['thumbnail']."'/></td>
				<td>".$row['name']."</td>
				<td>".$row['lectures_num']."</td>
				<td>".$row['fname'].' '.$row['lname']."</td>
				<td><a href='index.php?pending&approve=".$row["CID"]."'><i class='fa fa-check-circle' aria-hidden='true'></i></a></td>
				";
		endwhile;

	}
	function view_feedback(){
		include("inc/db.php");
		$get_cat=$con->prepare("select * from feedback");
		$get_cat->execute();
		$i=1;
		while ($row=$get_cat->fetch(PDO::FETCH_ASSOC)):
		echo"<tr>
				<td>".$i++."</td>
				<td>".$row['name']."</td>
				<td>".$row['email']."</td>
				<td>".$row['msg']."</td>
				";
		endwhile;
	}
	function approve_course(){
	if (isset($_GET['approve'])) {
		include("../admin/inc/db.php");
		$CID=$_GET["approve"];
		try {
		$sql = "UPDATE course SET approved=1 WHERE CID='$CID'";
		  $con->exec($sql);
		} catch(PDOException $e) {
		  echo $sql . "<br>" . $e->getMessage();
		}
	}
}
	function view_num_categories(){
		include("inc/db.php");
		$get_cat=$con->prepare("select count(*) as cat_num from cat");
		$get_cat->execute();
		$row=$get_cat->fetch(PDO::FETCH_ASSOC);
		echo $row["cat_num"];
	}
	function view_num_sub_categories(){
		include("inc/db.php");
		$get_cat=$con->prepare("select count(*) as sub_cat_num from sub_cat");
		$get_cat->execute();
		$row=$get_cat->fetch(PDO::FETCH_ASSOC);
		echo $row["sub_cat_num"];
	}
	function view_num_students(){
		include("inc/db.php");
		$get_cat=$con->prepare("select count(*) as student_num from signup_user where level='student'");
		$get_cat->execute();
		$row=$get_cat->fetch(PDO::FETCH_ASSOC);
		echo $row["student_num"];
	}
	function view_num_teachers(){
		include("inc/db.php");
		$get_cat=$con->prepare("select count(*) as teachers_num from signup_user where level='teacher'");
		$get_cat->execute();
		$row=$get_cat->fetch(PDO::FETCH_ASSOC);
		echo $row["teachers_num"];
	}
	function view_num_courses(){
		include("inc/db.php");
		$get_cat=$con->prepare("select count(*) as course_num from course where submitted='1' and approved=1");
		$get_cat->execute();
		$row=$get_cat->fetch(PDO::FETCH_ASSOC);
		echo $row["course_num"];
	}
	function view_num_pending_courses(){
		include("inc/db.php");
		$get_cat=$con->prepare("select count(*) as pending_course_num from course where submitted='1' and approved=0");
		$get_cat->execute();
		$row=$get_cat->fetch(PDO::FETCH_ASSOC);
		echo $row["pending_course_num"];
	}
	function view_num_feedback(){
		include("inc/db.php");
		$get_cat=$con->prepare("select count(*) as feedback_num from feedback");
		$get_cat->execute();
		$row=$get_cat->fetch(PDO::FETCH_ASSOC);
		echo $row["feedback_num"];
	}
function view_profit(){
	include("../admin/inc/db.php");
	$get_cat=$con->prepare("select COALESCE(SUM(price),0) as price from enrolled");
	$get_cat->execute();
	$row=$get_cat->fetch(PDO::FETCH_ASSOC);
	echo ceil(((60)/100)*($row["price"]));
}
?>