<div class="container">
	<h1>Edit</h1>
	<form action="<?= URL ?>student/editSave" method="post">
	
		<input type="text" name="firstname" value="<?= $student['student_firstname']; ?>">
		<input type="text" name="lastname" value="<?= $student['student_lastname']; ?>">
		
		<select name="gender">
			<option value="male" <?php if ($student['student_gender'] == "male") { echo "selected=\"true\""; } ?>>Male</option>
			<option value="female" <?php if ($student['student_gender'] == "female") { echo "selected=\"true\""; } ?>>Female</option>	
		</select>

		<input type="hidden" name="id" value="<?= $student['student_id']; ?>">
		<input type="submit" value="Verzenden">
	
	</form>

</div>
