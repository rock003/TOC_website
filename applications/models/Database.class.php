<?php

class Database{
	private $server;
	private $username;
	private $password;
	private static $dbInstance;
	
	private function __construct(){
		$this->server="localhost";
		$this->username = "toc_admin";
		$this->password = "PbXLzTXcWD6f6WbX"; 
		$this->connect();
	}
	
	function connect(){
		$connection = mysql_connect($this->server, $this->username, $this->password) or die("Could not connect: ".mysql_error());
		mysql_select_db("toc") or die("Could not select database: ".mysql_error());
		mysql_set_charset('utf8',$connection);
	}
	
	//debug version of query
	function query_d($sql){
		$args = func_get_args();	//get all the arguments
		
		if(count($args) > 1){	//more than 1 argument
			for($i=1; $i<count($args); $i++){
				$args[$i] = mysql_real_escape_string($args[$i]);
			}
			$query_string = vsprintf(array_shift($args), $args);
			$result = mysql_query($query_string);
		} else{		//only 1 argument
			$query_string = $sql;
			$result = mysql_query($sql);
		}
		echo $query_string."SQL Error(1): ".mysql_error()."\n";
		return $result;
	}
	
	function query($sql){
		$args = func_get_args();	//get all the arguments
		
		if(count($args) > 1){	//more than 1 argument
			for($i=1; $i<count($args); $i++){
				$args[$i] = mysql_real_escape_string($args[$i]);
			}
			$result = mysql_query(vsprintf(array_shift($args), $args)) or die("SQL Error(1): ".mysql_error());
		} else{		//only 1 argument
			$result = mysql_query($sql) or die("SQL Error(1): ".mysql_error());
		}
		return $result;
	}
	
	function query_fetch_array($query){
		$result = mysql_fetch_array($query);
		return $result;
	}
	
	function query_get_num_row($query){
		return mysql_num_rows($query);
	}
	
	public static function getInstance(){
		if (!self::$dbInstance){
			self::$dbInstance = new self();
		}
	
		return self::$dbInstance;
	}  
}