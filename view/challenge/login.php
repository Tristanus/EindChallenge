<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Login</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" action="<?= URL ?>challenge/login" method="post">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Email" name="email" type="text" required autofocus>
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Wachtwoord" name="password" type="password" required>
			    		</div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>