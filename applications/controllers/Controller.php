<?php

class Controller{
	private $view;
	
	function __construct($uri){
		$this->view = new View($this);
		$this->getPage($uri);
	}
	
	function getPage($page){
		$view = $this->getView();

		switch($page){
			case "home":
				toc_home($view);
				break;
			case "program":
				toc_program($view);
				break;
			case "student_gallery":
				toc_student_gallery($view);
				break;
			case "services":
				services($view);
				break;
			case "links":
				links($view);
				break;
			case "reg_form":
				reg_form($view);
				break;
			case "summer_camp_form":
				summer_camp_form($view);
				break;
			case "weekday_form":
				weekday_form($view);
				break;
			case "contact":
				contact($view);
				break;
			case "chinese":
				chinese($view);
				break;
			case "about":
				about($view);
				break;
			case "resources":
				resources($view);
				break;
			case "user_login":
				user_login($view);
				break;
			case "user_landing":
				user_landing($view);
				break;
			case "create_files":
				create_files();
				break;
			case "logout":
				user_logout();
				break;
			case "ajax_gallery":
				student_gallery($_POST["year"]);
				break;
			case "ajax_student_info":
				student_info($_POST["u_id"]);
				break;
			case "ajax_student_update":
				student_update($_POST);
				break;
			case "ajax_filter_class":
				filter_class($_POST);
				break;
			case "ajax_add_class":
				add_class($_POST);
				break;
			case "ajax_delete_class":
				delete_class($_POST);
				break;
			case "ajax_calendar_event":
				calendar_event($_GET);
				break;
			default:
				toc_home($view);
				break;
		}
	}
	
	function getView(){
		return $this->view;
	}
}