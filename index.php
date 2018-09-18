<?php
session_start();
include("lib/PhpLogic.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>FormKledingdrukkerij</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<?php if($_SESSION['loginStatus'] == "false") {?>
	<div class="container">
	  <h2>Login</h2>
	  <form action="index.php" method="post">
	    <div class="form-group">
	      <label for="Gebruikersnaam">Gebruikersnaam</label>
	      <input type="text" name="GB" class="form-control" id="gebruiker" placeholder="Gebruikersnaam">
	    </div>
	    <div class="form-group">
	      <label for="pwd">Wachtwoord</label>
	      <input type="password" name="WW" class="form-control" id="wachtwoord" placeholder="Wachtwoord">
	    </div>
	    <div class="form-group form-check">
	    </div>
	    <button type="submit" name="Login" class="btn btn-primary btn-md btn-block">Log in</button>
	  </form>
	</div>
<?php } 
if ($_SESSION['loginStatus'] == "True") {?>
	<div class="container">
		<form method="post" action="">
			<div class="form-group">
			 	<label>Product:</label>
			 	<input type="text" required class="form-control" name="Product">
			 </div>
			   <div class="form-group">
			    <label for="Maat">Maat:</label>
			    <select  class="form-control" name="Maat">
			      <option>Selecteer maat</option>
			      <option>XS</option>
			      <option>S</option>
			      <option>M</option>
			      <option>L</option>
			      <option>XL</option>
			      <option>XXL</option>
			    </select>
			  </div>
			 <div class="form-group" >
			 	<label>Aantal:</label>
			 	<input placeholder="Voer een Aantal in" name="Aantal" required type="number" value="" min="0" max="1000"/>
			 </div>
			 <div class="form-group">
			 	<label></label>
			 	<button type="submit" name="bewaarGegevens" class="btn btn-primary btn-md btn-block">Opslaan/ander product toevoegen</button>
			 </div>
			 <div class="form-group">
			 	<button type="submit" name="VerzendGegevens" class="btn btn-primary btn-md btn-block">Sluit en verzend order</button>
			 </div>
		</form>
	</div>
<?php } ?>
	<script src="lib/bootstrap-input-spinner.js"></script>
	<script>
    	$("input[type='number']").inputSpinner()
	</script>
</body>
</html>