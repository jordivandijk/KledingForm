<?php
session_start();
include("lib/PhpLogic.php");
$DBcon = new DBconnect();
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
<?php if(login::$loginStatus == "false") {?>
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
	    <button type="submit" name="submit" class="btn btn-primary">Log in</button>
	  </form>
	</div>
<?php } 
if (login::$loginStatus == "True") {?>
	<div class="container">
		<h3>test</h3>
	</div>
<?php } ?>
</body>
</html>