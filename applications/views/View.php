<?php

class View{
	private $controller;
	private $content;
	private $vars;
	
	function __construct($controller){
		$this->controller = $controller;
	}
	
	function setView($page){
		ob_start();
		$vars = $this->getVars();	//get the array containing custom contents
		include("html/".$page.".tpl.php");
		$this->content = ob_get_contents();
		ob_end_clean();
	}
	
	//call this to set custom content
	function setVars($key,$value){
		$this->vars[$key] = $value;
	}
	
	//call to get custom content
	function getVars(){
		return $this->vars;
	}
	
	function __tostring(){
		return $this->content;
	}
}