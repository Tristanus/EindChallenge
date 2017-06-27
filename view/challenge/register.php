<form class="form-horizontal" action="<?= URL ?>challenge/registerSave" method="post">
<fieldset>

<!-- Form Name -->
<legend>Register</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="firstname">First Name</label>  
  <div class="col-md-4">
  <input id="firstname" name="firstname" type="text" placeholder="Enter your first name" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="lastname">Last name</label>  
  <div class="col-md-4">
  <input id="lastname" name="lastname" type="text" placeholder="Enter your last name id" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-4">
    <input id="password" name="password" type="password" placeholder="Enter a password" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="address">Address</label>  
  <div class="col-md-4">
  <input id="address" name="address" type="text" placeholder="Enter your address" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="zipcode">Zip Code</label>  
  <div class="col-md-4">
  <input id="zipcode" name="zipcode" type="text" placeholder="Enter your zip code" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="city">City</label>  
  <div class="col-md-4">
  <input id="city" name="city" type="text" placeholder="Enter your city" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="telephone">Telephone</label>  
  <div class="col-md-4">
  <input id="telephone" name="telephone" type="text" placeholder="Enter your telephone number" class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="mobile">Mobile</label>  
  <div class="col-md-4">
  <input id="mobile" name="mobile" type="text" placeholder="Enter your mobile number" class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="email">E-mail</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="Enter your email" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="signup"></label>
  <div class="col-md-4">
    <button id="signup" name="signup" class="btn btn-success">Sign Up</button>
  </div>
</div>

</fieldset>
</form>
