<?php
 if (isset($_POST['submit'])) 
 {
 	$login = new login($_POST['GB'],$_POST['WW']);
 }
/**
 * Kleine login validatie class
 */
class login
{
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname =	"kledingdrukkerij";
	private $gebruikersnaam;
	private $wachtwoord;
	public static $loginStatus = "false";
	
	function __construct($gb,$ww)
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
		} else {
			self::$loginStatus = "false";
			echo "<h3>Login ongeldig!</h3>";
		}
		$conn->close();
	}
}
?>