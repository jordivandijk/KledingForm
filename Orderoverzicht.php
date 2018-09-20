<?php
include("lib/PhpLogic.php");
$db->orderOphalen();

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
      <?php if(Database::$loginStatus == "True"){ ?>
        <form class="form-inline my-2 my-lg-0" method="post" action="index.php">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="uitloggen">Uitloggen</button>
        </form>
      <?php } ?>
    </div>
  </nav>
<div class="container">
<?php
if (Database::$loginStatus == "True")
{
?>
  
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Product</th>
        <th>Maat</th>
        <th>Aantal</th>
      </tr>
    </thead>
    <tbody>
        <?php
          foreach( Database::$order as $key )
          {
            echo '<tr><td>'.$key['Product'].'</td><td>'.$key['Maat'].'</td><td>'.$key['Aantal'].'</td><td><a href="Orderoverzicht.php?delete='.$key['id'].'"><img style="height: 20px; width: 20px;" src="img/verwijder.png"></a></td></tr>';
          }
        ?>
    </tbody>
  </table>
  <br>
</div>
  <div class="container">
    <form>
      <div class="form-group">
        <button type="submit" name="VerzendGegevens" class="btn btn-primary btn-md btn-block">Sluit en verzend order</button>
      </div>
    </form>
  </div>
<?php } 
if(Database::$loginStatus == "false")
{ ?>
  <div class="alert alert-danger" role="alert">
    U heeft geen toegang! <a href="index.php">Log eerst in!</a>
  </div>
<?php } ?>
</body>
</html>