<?php
session_start();
$db = new Database();

if (isset($_POST['Login'])) 
{
 	$db->login($_POST['GB'],$_POST['WW']);
}

if (isset($_POST['uitloggen']))
{
 	unset($_SESSION['loginStatus']);
 	session_destroy();
}

if (isset($_SESSION['loginStatus']))
{
	Database::$loginStatus = $_SESSION['loginStatus'];
}

if (isset($_POST['bewaarGegevens'])) 
{
	$db->opslaan($_POST['Product'], $_POST['Maat'], $_POST['Aantal']);
}

class Database
{
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname =	"kledingdrukkerij";
	private $gebruikersnaam;
	private $wachtwoord;
	public static $loginStatus = "false";
	
	function login($gb,$ww)
	{
		$this->gebruikersnaam = $gb;
		$this->wachtwoord = $ww;
		$this->validateUser();
	}

	private function validateUser()
	{
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		$query = "SELECT * FROM gebruikers WHERE Gebruikersnaam = '". $this->gebruikersnaam ."' AND Wachtwoord = '". $this->wachtwoord ."'" ;
		$result = mysqli_query($conn,$query);
		if (mysqli_num_rows($result) == 1) {
			self::$loginStatus = "True";
			$_SESSION['loginStatus'] ="True";
		} else {
			self::$loginStatus = "false";
			$_SESSION['loginStatus'] = "false";
			echo "<h3>Login ongeldig!</h3>";
		}
		$conn->close();
	}

	function opslaan($product,$maat,$aantal)
	{
		
	}
}
?>