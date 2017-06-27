<h1>Wijzig een student</h1>
<form action="<?= URL ?>challenge/editSave" method="post">
	<input type="hidden" name="id" value="<?= $user['id']; ?>">
	<div>
		<label for="firstname">Firstname:</label>
		<input class="form-control" type="text" name="firstname" value="<?= $user['firstname']; ?>">
	</div>
	<div>
		<label for="lastname">Lastname:</label>
		<input class="form-control" type="text" name="lastname" value="<?= $user['lastname']; ?>">
	</div>
	<div>
		<label for="username">Username:</label>
		<input class="form-control" type="text" name="username" value="<?= $user['username']; ?>">
	</div>
	<div>
		<label for="password">Password:</label>
		<input class="form-control" type="password" name="password">
	</div>
	<div>
		<label for="email">Email:</label>
		<input class="form-control" type="email" name="email" value="<?= $user['email']; ?>">
	</div>
	<div>
		<label for="role">role:</label>
		<select name="role">
			<option value="Student" <?php if ($user['role'] == "Student") { echo "selected=\"selected\""; } ?>>Student</option>
			<option value="Docent" <?php if ($user['role'] == "Docent") { echo "selected=\"selected\""; } ?>>Docent</option>
		</select>
	</div>
	<div>
		<input type="submit" value="Send">
	</div>
</form>