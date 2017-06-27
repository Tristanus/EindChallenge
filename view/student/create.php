<div class="container">
	<form action="<?= URL ?>student/createSave" method="post">
	
		<input type="text" name="firstname" placeholder="john">
		<input type="text" name="lastname" placeholder="doe">
		<select name="gender">
			<option value="male">Male</option>
			<option value="female">Female</option>	
		</select>

		<input type="submit" value="Verzenden">
	
	</form>

</div>