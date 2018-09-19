<?php
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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">KledingDrukkerij</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
          <a class="nav-link" href="index.php">Producten toevoegen<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="Orderoverzicht.php">Overzicht en afsluiten order<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <?php if(Database::$loginStatus == "True") { ?>
	    <form class="form-inline my-2 my-lg-0" method="post" action="index.php">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="uitloggen">Uitloggen</button>
	    </form>
    <?php } ?>
  </div>
</nav>
<?php 
if(Database::$loginStatus == "false")
{ ?>
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
if (Database::$loginStatus == "True")
{ ?>
	<div class="container">
		<form method="post" action="">
			<div class="form-group">
			 	<label>Product:</label>
			 	<input type="text" required class="form-control" name="Product">
			 </div>
			   <div class="form-group">
			    <label for="Maat">Maat:</label>
			    <select  class="form-control" name="Maat">
			      <option>--Selecteer maat--</option>
			      <option>XS</option>
			      <option>S</option>
			      <option>M</option>
			      <option>L</option>
			      <option>XL</option>
			      <option>XXL</option>
			      <option>--Broek maten--</option>
			      <option>42</option>
			      <option>43</option>
			      <option>44</option>
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
		</form>
	</div>
<?php } ?>
	<script src="lib/bootstrap-input-spinner.js"></script>
	<script>
    	$("input[type='number']").inputSpinner()
	</script>
</body>
