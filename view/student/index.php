<div class="container">
	<table border="1">
		<tr>
			<th>#</th>
			<th>Voornaam</th>
			<th>Achternaam</th>
			<th>Geslacht</th>
			<th colspan="2">Actie</th>
		</tr>
		
		<?php foreach ($students as $student) { ?>
		<tr>
			<td><?= $student['student_id']; ?></td>
			<td><?= $student['student_firstname']; ?></td>
			<td><?= $student['student_lastname']; ?></td>
			<td><?= $student['student_gender']; ?></td>
			<td><a href="<?= URL ?>student/edit/<?= $student['student_id'] ?>">Edit</a></td>
			<td><a href="<?= URL ?>student/delete/<?= $student['student_id'] ?>">Delete</a></td>
		</tr>
		<?php } ?>

	</table>
	<a href="<?= URL ?>student/create">Toevoegen</a>
</div>