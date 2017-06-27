<h1>Maak een nieuw examen aan</h1>
<form action="<?= URL ?>challenge/createExamSave" method="post">
	<div>
		<label for="subject">Vak:</label>
		<input class="form-control"  type="text" name="subject">
	</div>
	<div>
		<label for="_time">Datum:</label>
		<input class="form-control"  type="datetime-local" name="_time">
	</div>
	<div>
		<label for="examinator_1">Examinator 1:</label>
		<input class="form-control"  type="text" name="examinator_1">
	</div>
	<div>
		<label for="examinator_2">Examinator 2:</label>
		<input class="form-control" type="text" name="examinator_2">
	</div>
	<div>
		<input type="submit" value="Send">
	</div>
</form>