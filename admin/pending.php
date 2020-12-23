<?php echo approve_course(); ?>

<div id="bodyright">
	<h3>Unpublished Courses</h3>
	<div id="add">
		<table cellspacing="0">
			<tr>
				<th>Sr No.</th>
				<th></th>
				<th>Course Name</th>
				<th>Number of lectures</th>
				<th>Teacher</th> 
				<th>Approve</th>
			</tr>
			<?php echo view_pending(); ?>
		</table>
	</div>

</div>
