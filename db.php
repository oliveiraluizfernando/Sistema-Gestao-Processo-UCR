<?php

include_once "config.php";

class Database
{
	
	private $con;

	public function connectDB(){
		$this->con = new Mysqli(SERVER,USER,PASSWORD,DB);
		if($this->con->connect_error){
			echo "Error : ".die($this->con->connect_error);
		}
		return $this->con;
	}

}

?>