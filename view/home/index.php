<div class="container">
	<h1>Welkom bij de challenge.</h1>

<?php if(isset($_SESSION['role']) && $_SESSION['role'] == "Docent"): ?>

	<p>Hier ziet u een overzicht van alle studenten die momenteel in de database staan.</p>
	<table border="1">
		<tr>
			<th>Id</th>
			<th>Voornaam</th>
			<th>Achternaam</th>
			<th>Email</th>
			<th>Username</th>
			<th>Role</th>
			<th></th>
			<th></th>
		</tr>
		
		<?php foreach ($users as $user) { ?>
		<tr>
			<td><?= $user['id']; ?></td>
			<td><?= $user['firstname']; ?></td>
			<td><?= $user['lastname']; ?></td>
			<td><?= $user['email']; ?></td>
			<td><?= $user['username']; ?></td>
			<td><?= $user['role']; ?></td>
			<td><a href="<?= URL ?>challenge/edit/<?= $user['id'] ?>">Edit</a></td>
			<td><a href="<?= URL ?>challenge/delete/<?= $user['id'] ?>">Delete</a></td>
		</tr>
		<?php } ?>

	</table>

	<a href="<?= URL ?>challenge/create">Toevoegen</a>

<?php endif; ?>	

</div>
