<div class="container">
    <h1 class="well">Registration Form</h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form action="<?= URL ?>challenge/registerSave" method="post">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-4 form-group">
								<label for="firstname">Voornaam</label>
								<input type="text" placeholder="Voornaam" class="form-control" name="firstname">
							</div>
							<div class="col-sm-4 form-group">
								<label for="firstname">Achternaam</label>
								<input type="text" placeholder="Achternaam" class="form-control" name="lastname">
							</div>
							<div class="col-sm-4 form-group">
								<label for="password">Wachtwoord</label>
								<input type="password" placeholder="Wachtwoord" class="form-control" name="password">
							</div>
						</div>					
						<div class="form-group">
							<label for="address">Adres</label>
							<textarea placeholder="Adres" rows="3" class="form-control" name="address"></textarea>
						</div>	
						<div class="row">
							<div class="col-sm-6 form-group">
								<label for="city">Stad</label>
								<input type="text" placeholder="Stad" class="form-control"  name="city">
							</div>
							<div class="col-sm-6 form-group">
								<label for="zipcode">Postcode</label>
								<input type="text" placeholder="Postcode" class="form-control" name="zipcode">
							</div>		
						</div>
						<div class="row">						
							<div class="col-sm-6 form-group">
								<label for="telephone">Telefoon</label>
								<input type="text" placeholder="Telefoon nummer" class="form-control" name="telephone">
							</div>
							<div class="col-sm-6 form-group">
								<label for="mobilephone">Mobiel</label>
								<input type="text" placeholder="Mobiel nummer" class="form-control" name="mobilephone">
							</div>
						</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" placeholder="Email" class="form-control" name="email">
					</div>	
						<button type="submit" value="Send" class="btn btn-lg btn-info">Submit</button>			
					</div>
				</form> 
				</div>
	</div>
	</div>