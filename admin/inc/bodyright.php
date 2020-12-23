<?php if (!isset($_GET['cat']) && !isset($_GET['sub_cat']) && !isset($_GET['contact']) & !isset($_GET['view_std']) && !isset($_GET['faqs']) && !isset($_GET['active']) && !isset($_GET['msg']) && !isset($_GET['pending']) && !isset($_GET['teacher']) && !isset($_GET['pay'])) { ?>

<div id="bodyright">
	<h3>OverView</h3>
	<div id="homebody">
		<div class="fees">
			<i class="fa fa-money" aria-hidden="true"></i>
  			<h2>&#8377; <?php echo view_profit();?></h2>
  			<p>Total Profit</p>
		</div>

		<div class="body-flex-box">   
			<div class="box-holder">
				<div class="box">
					<div class="box-upper">
						<div class="box-lhs">
							<div class="box-num"><?php echo view_num_categories();?></div>
							<div class="box-name">Total Categories</div>
						</div> 
						<div class="box-rhs">
							<div class="icon"><i class="fa fa-th-large" aria-hidden="true"></i></div>
						</div>						
					</div>
					<a href="index.php?cat" class="view-more">View More</a>
				</div>
			</div>
			<div class="box-holder">
				<div class="box">
					<div class="box-upper">
						<div class="box-lhs">
							<div class="box-num"><?php echo view_num_sub_categories();?></div>
							<div class="box-name">Total Sub Categories</div>
						</div>
						<div class="box-rhs">
							<div class="icon"><i class="fa fa-list" aria-hidden="true"></i></div>
						</div>						
					</div>
					<a href="index.php?sub_cat" class="view-more">View More</a>
				</div>
			</div>
			<div class="box-holder">
				<div class="box">
					<div class="box-upper">
						<div class="box-lhs">
							<div class="box-num"><?php echo view_num_students();?></div>
							<div class="box-name">Total Students</div>
						</div>
						<div class="box-rhs">
							<div class="icon"><i class="fa fa-graduation-cap" aria-hidden="true"></i></div>
						</div>						
					</div>
					<a href="index.php?view_std" class="view-more">View More</a>
				</div>
			</div>
			<div class="box-holder">
				<div class="box">
					<div class="box-upper">
						<div class="box-lhs">
							<div class="box-num"><?php echo view_num_teachers();?></div>
							<div class="box-name">Total Teachers</div>
						</div>
						<div class="box-rhs">
							<div class="icon"><i class="fa fa-users" aria-hidden="true"></i></div>
						</div>						
					</div>
					<a href="index.php?teacher" class="view-more">View More</a>
				</div>
			</div>
			<div class="box-holder">
				<div class="box">
					<div class="box-upper">
						<div class="box-lhs">
							<div class="box-num"><?php echo view_num_courses();?></div>
							<div class="box-name">Active Courses</div>
						</div>
						<div class="box-rhs">
							<div class="icon"><i class="fa fa-book" aria-hidden="true"></i></div>
						</div>						
					</div>
					<a href="index.php?active" class="view-more">View More</a>
				</div>
			</div>
			<div class="box-holder">
				<div class="box">
					<div class="box-upper">
						<div class="box-lhs">
							<div class="box-num"><?php echo view_num_pending_courses(); ?></div>
							<div class="box-name">Unpublished Courses   </div>
						</div>
						<div class="box-rhs">
							<div class="icon"><i class="fa fa-spinner" aria-hidden="true"></i></div>
						</div>						
					</div>
					<a href="index.php?pending" class="view-more">View More</a>
				</div>
			</div>
			<div class="box-holder">
				<div class="box">
					<div class="box-upper">
						<div class="box-lhs">
							<div class="box-num"><?php echo view_num_feedback(); ?></div>
							<div class="box-name">User Messeges</div>
						</div>
						<div class="box-rhs">
							<div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
						</div>						
					</div>
					<a href="index.php?msg" class="view-more">View More</a>
				</div>
			</div>

			<div class="box-holder">
				<div class="box">
					<div class="box-upper">
						<div class="box-lhs">
							<div class="box-name">Contact Us<br>   </div>
						</div>
						<div class="box-rhs">
							<div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
						</div>						
					</div>
					<a href="index.php?contact" class="view-more">View More</a>
				</div>
			</div>
		<!--	<div class="box-holder">
				<div class="box">
					<div class="box-upper">
						<div class="box-lhs">
							<div class="box-name">FAQs</div>
						</div>
						<div class="box-rhs">
							<div class="icon"><i class="fa fa-question-circle" aria-hidden="true"></i></div>
						</div>						
					</div>
					<a href="index.php?faqs" class="view-more">View More</a>
				</div>
			</div>    --->
			
		</div>		
	</div>
</div> 

<?php } ?>