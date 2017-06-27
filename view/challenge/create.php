<h1>Maak een nieuwe student aan</h1>
<form action="<?= URL ?>challenge/createSave" method="post">
	<div>
		<label for="firstname">Firstname:</label>
		<input class="form-control"  type="text" name="firstname">
	</div>
	<div>
		<label for="lastname">Lastname:</label>
		<input class="form-control"  type="text" name="lastname">
	</div>
	<div>
		<label for="username">Username:</label>
		<input class="form-control"  type="text" name="username">
	</div>
	<div>
		<label for="password">Password:</label>
		<input class="form-control" type="password" name="password">
	</div>
	<div>
		<label for="email">Email:</label>
		<input class="form-control" type="email" name="email">
	</div>
	<div>
		<label for="role">role:</label>
		<select>
			<option value="Student">Student</option>
			<option value="Docent">Docent</option>
		</select>
	</div>
	<div>
		<input type="submit" value="Send">
	</div>
</form>