<?php
 if (isset($_POST['submit'])) 
 {
 	$login = new login($_POST['GB'],$_POST['WW']);
 }



/**
 * Hier connect ik met de database in localhost genaamd kledingdrukkerij.
 */
class DBconnect
{
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname =	"kledingdrukkerij";
	public static $connStatus;
	
	function __construct()
	{
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if ($conn->connect_error) 
		{
    		self::$connStatus = "Connection failed: " . $conn->connect_error;
		}else{
			self::$connStatus =  "Connected succesfully";
		}
	}
}

/**
 * Kleine login validatie class
 */
class login
{
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
		if($this->gebruikersnaam == "admin.jordi" && $this->wachtwoord == "Zakelijk01")
		{
			self::$loginStatus = "True";
		}
	}

}
?>