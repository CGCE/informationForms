<?php
class db
	{
	var $host;
	var $dbname;
	var $user;
	var $password;
	var $conn;
	var $result;
	var $nb;

	function db()
		{
		$this->host="localhost";
		$this->dbname="reidhall_www";
		$this->user="www";
		$this->password="JL7Ubo";
		}
			
	function connect()
		{
		$this->conn=mysql_connect($this->host,$this->user,$this->password);
		mysql_select_db($this->dbname,$this->conn);
		}
	
	function query($requete)
		{
		$this->connect();
		$req=mysql_query($requete,$this->conn);
		
		if(!$req)
			{
			echo "<br><br>### ERREUR SQL ###<br><br>$requete<br><br>";
			echo mysql_error();
			echo "<br><br>";
			}
		elseif(strtolower(substr(trim($requete),0,6))=="select")
			{
			$this->nb=mysql_num_rows($req);
			for($i=0;$i<$this->nb;$i++)
				$this->result[]=mysql_fetch_array($req);
			}
		$this->disconnect();
		}

	function disconnect()
		{
		mysql_close($this->conn);
		}
	}
	
?>
