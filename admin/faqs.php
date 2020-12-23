 <?php echo add_faqs(); ?>
  <div id="bodyright">
	<h3>FAQs </h3>
	<div id="add">
		<details>
			<summary>Add FAQs</summary>
			<form method="post" enctype="multipart/form-data">
				<input type="text" name="ques" placeholder="Enter Question" required="required" />
				<textarea name="ans" placeholder="Enter Answer"></textarea>
				<center><button name="add_faqs">Add</button></center>
			</form>
		</details>
	</div>
</div>

