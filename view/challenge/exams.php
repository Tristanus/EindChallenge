<div class="container">
	<h1>Alle ingeplande examens</h1>

	<p>Hier ziet u een overzicht van alle examens die momenteel gepland zijn.</p>
	<table border="1">
		<tr>
			<th>Id</th>
			<th>Vak/naam</th>
			<th>Datum</th>
			<th>Examinator 1</th>
			<th>Examinator 2</th>
			<th></th>
			<th></th>
		</tr>
		
		<?php foreach ($exams as $exam) { ?>
		<tr>
			<td><?= $exam['id']; ?></td>
			<td><?= $exam['subject']; ?></td>
			<td><?= $exam['_time']; ?></td>
			<td><?= $exam['examinator_1']; ?></td>
			<td><?= $exam['examinator_2']; ?></td>
			<td><a href="<?= URL ?>challenge/editExam/<?= $exam['id'] ?>">Edit</a></td>
			<td><a href="<?= URL ?>challenge/deleteExam/<?= $exam['id'] ?>">Delete</a></td>
		</tr>
		<?php } ?>

	</table>

	<a href="<?= URL ?>challenge/createExam">Toevoegen</a>

</div>
