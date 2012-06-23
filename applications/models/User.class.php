<?php

class User{
	private $user_info;
	private $user_role;
	
	function __construct(){
	}
	
	//check user login
	function login($userName, $password){
		$DB = Database::getInstance();
		
		$query = $DB->query("SELECT * FROM user WHERE BINARY userName='%s' AND password='%s'", $userName, md5($password));
		if($DB->query_get_num_row($query)){
			$result = $DB->query_fetch_array($query);
			$this->user_info = $result;
			$this->set_user_role($result["u_id"]);
			
			return true;
		}
		
		return false;
	}
	
	//set user role with given uid
	private function set_user_role($u_id){
		$DB = Database::getInstance();
		
		$query = $DB->query("SELECT r.* FROM role r LEFT JOIN user_role ur ON r.r_id=ur.r_id WHERE ur.u_id='%d'", $u_id);
		if($DB->query_get_num_row($query)){
			$result = $DB->query_fetch_array($query);
			$this->user_role = $result["r_id"];
		} else{
			$this->user_role = "4";		//anonymous
		}
		
		return;
	}
	
	//get user info with given variable name
	function get_user_info($var){
		return $this->user_info[$var];
	}
	
	//get user role
	function get_user_role(){
		return $this->user_role;
	}
}