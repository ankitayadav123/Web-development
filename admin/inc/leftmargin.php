<div id="leftmargin">
	<h3><i class="fa fa-cog" aria-hidden="true"></i> Categories Manegement</h3>
	<ul>  
		<li><a href="index.php"><i class="fa fa-pie-chart" aria-hidden="true"></i> Dashboard</a></li>
		<li><a href="index.php?cat"><i class="fa fa-bars" aria-hidden="true"></i> View Categories</a></li>
		<li><a href="index.php?sub_cat"><i class="fa fa-list" aria-hidden="true"></i> View Sub Categories</a></li>
	</ul>
	<h3><i class="fa fa-book" aria-hidden="true"></i> Courses Manegement</h3>
	<ul>
		<li><a href="index.php?active"><i class="fa fa-check-square-o" aria-hidden="true"></i> Active Courses</a></li>
		<li><a href="index.php?pending"><i class="fa fa-spinner" aria-hidden="true"></i> Pending Courses</a></li>
	</ul>
	<h3><i class="fa fa-user-circle-o" aria-hidden="true"></i> User Manegement</h3>
	<ul>
		<li><a href="index.php?view_std"><i class="fa fa-graduation-cap" aria-hidden="true"></i> View Students</a></li>
		<li><a href="index.php?teacher"><i class="fa fa-users" aria-hidden="true"></i> View Teachers</a></li>
		<li><a href="index.php?msg"><i class="fa fa-envelope" aria-hidden="true"></i> View User Messeges</a></li>

	</ul>
	<h3><i class="fa fa-file-text" aria-hidden="true"></i> Page Manegement</h3>
	<ul>
		<li><a href="index.php?contact"><i class="fa fa-phone-square" aria-hidden="true"></i> Contact us</a></li>
	<!--<li><a href="index.php?faqs"><i class="fa fa-question-circle" aria-hidden="true"></i> FAQs</a></li>-->
	</ul>
</div>

<?php

	if (isset($_GET['cat'])) {
	  include("cat.php");
	}
	if (isset($_GET['sub_cat'])) {
	  include("sub_cat.php");
	}
	if (isset($_GET['contact'])) {
	  include("contact.php");
	}
	if (isset($_GET['view_std'])) {
	  include("view_std.php");
	}
	if (isset($_GET['faqs'])) {
	  include("faqs.php");
	}
	if (isset($_GET['active'])) {
	  include("active.php");
	}
	if (isset($_GET['teacher'])) {
	  include("teacher.php");
	}
	if (isset($_GET['pay'])) {
	  include("pay.php");
	}
	if (isset($_GET['pending'])) {
	  include("pending.php");
	}
	if (isset($_GET['msg'])) {
	  include("msg.php");
	}
	
	

 ?>