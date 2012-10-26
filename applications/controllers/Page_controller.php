<?php

function toc_home($view){
	$view->setView("home");
	echo $view;
		
	return;
}

function toc_program($view){
	$view->setView("program");
	echo $view;
		
	return;
}

function toc_student_gallery($view){
	$DB = Database::getInstance();
	
	//default load all images from 2011
	$query = $DB->query("SELECT * FROM files WHERE Location='%s' ORDER BY display_order ASC", "images/student_gallery/2011");
	while($result = $DB->query_fetch_array($query)){
		$images[] = array($result["location"]."/".$result["name"], $result["description"]);
	}
	
	foreach($images as $index => $image){
		if($index == 0){
			$image_content[] = '<img class="rounded-img active" src="'.$image[0].'" alt="'.$image[1].'" />';
		} else{
			$image_content[] = '<img class="rounded-img" src="'.$image[0].'" alt="'.$image[1].'" />';
		}
		$image_slide_content[] = '<img src="'.$image[0].'" /> ';
	}
	
	$view->setVars("images", $image_content);
	$view->setVars("images_slides", $image_slide_content);
	$view->setView("student_gallery");
	
	echo $view;
		
	return;
}

function services($view){
	$view->setView("services");
	echo $view;
		
	return;
}

function links($view){
	$view->setView("links");
	echo $view;
		
	return;
}

function reg_form($view){
	$view->setView("reg_form");
	echo $view;
		
	return;
}

function summer_camp_form($view){
	$view->setView("summer_camp_form");
	echo $view;
		
	return;
}

function weekday_form($view){
	$view->setView("weekday_form");
	echo $view;
		
	return;
}

function contact($view){
	$view->setView("contact");
	echo $view;
		
	return;
}

function about($view){
	$view->setView("about");
	echo $view;
	
	return;
}

function resources($view){
	$view->setView("resources");
	echo $view;
	
	return;
}

function chinese($view){
	$view->setView("chinese");
	echo $view;
		
	return;
}

function user_login($view){
	session_start();
	$host  = $_SERVER['HTTP_HOST'];
	
	if(isset($_SESSION['uid'])){
		//already login, go to corresponding landing page
		header("Location: http://$host/user_landing");
	} else{
		if($_POST){
			$user = new User();
			if($user->login($_POST["userName"], $_POST["password"])){
				$_SESSION["uid"] = $user->get_user_info("u_id");
				$_SESSION["userName"] = $user->get_user_info("userName");
				$_SESSION["role"] = $user->get_user_role();
				$_SESSION["start_time"] = time();
				
				header("Location: http://$host/user_landing");
			} else{
				$view->setVars("msg", "Login information incorrect");
			}
		}
		
		$view->setView("user_login");
		echo $view;
			
		return;
	}
}

function user_logout(){
	session_start();
	session_unset();
    session_destroy();
	setcookie(session_name(),'',0,'/');
	
	$host  = $_SERVER['HTTP_HOST'];
	header("Location: http://$host/home");
}

function user_landing($view){
	session_start();
	$host  = $_SERVER['HTTP_HOST'];
	
	$DB = Database::getInstance();
	if(!isset($_SESSION["uid"]) || !isset($_SESSION["role"])){		//not login or no role in session
		header("Location: http://$host/user_login");
	} else if($_SESSION["role"] == "1" && checkSessionTime()){		//admin
		$query_user = $DB->query("SELECT u.* FROM user u LEFT JOIN user_role ur ON u.u_id = ur.u_id LEFT JOIN role r ON r.r_id = ur.r_id WHERE r.name='Student' ORDER BY u.firstName ASC");
		while($result_user = $DB->query_fetch_array($query_user)){
			$users[] = $result_user;
		}
		
		$query_role = $DB->query("SELECT * FROM role");
		while($result_role = $DB->query_fetch_array($query_role)){
			$roles[] = $result_role;
		}
		
		$query_feature = $DB->query("SELECT * FROM feature");
		while($result_feature = $DB->query_fetch_array($query_feature)){
			$features[] = $result_feature;
		}
		
		$query_class = $DB->query("SELECT * FROM class ORDER BY name ASC");
		while($result_class = $DB->query_fetch_array($query_class)){
			$classes[] = $result_class;
		}
		
		$view->setVars("users", $users);
		$view->setVars("roles", $roles);
		$view->setVars("features", $features);
		$view->setVars("classes", $classes);
		
		$view->setView("user_landing_admin");
	} else if($_SESSION["role"] == "2" && checkSessionTime()){		//teacher
		//TODO: teacher
	} else if(!checkSessionTime()){		//session expired
		header("Location: http://$host/logout");
	} else{		//default back to home page
		session_unset();
		session_destroy();
		setcookie(session_name(),'',0,'/');
		
		header("Location: http://$host/home");
	}
	
	echo $view;
	return;
}

function create_files(){
	$DB = Database::getInstance();
	
	$query = $DB->query("SELECT u.*, c.name FROM user_class uc LEFT JOIN class c ON uc.c_id = c.c_id LEFT JOIN user u ON uc.u_id=u.u_id LEFT JOIN user_role ur ON u.u_id = ur.u_id WHERE ur.r_id=3 AND uc.year='2011' ORDER BY c.name ASC, u.lastName ASC");
	while($result = $DB->query_fetch_array($query)){
		$class[$result["name"]][] = $result;
	}

	foreach($class as $level => $users){
		$myFile = "docunments/".$level.".doc";
		$fh = fopen($myFile, 'w') or die("can't open file");
		$header = '<html><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
		fwrite($fh, $header);
		foreach($users as $user){
			$stringData = "<p><b>".$user["lastName"]." ".$user["firstName"]."  ".$user["chineseName"]."</b><br />"."Home Phone: ".$user["phoneNumber"]."<br />"."Father:  ".$user["fatherName"]."<br />Phone:  ".$user["fatherPhone"]."<br />"."Mother:  ".$user["motherName"]."<br />Phone:  ".$user["motherPhone"]."</p><br /><br />";
			fwrite($fh, $stringData);
		}
		$footer = '</body></html>';
		fwrite($fh, $footer);
		fclose($fh);
	}
	
	echo "Success!";
}

/******************************************* helper function ************************************************/
function checkSessionTime(){
	if($_SESSION["start_time"] > (time() - (60 * 15))){		//if inactive for 15 mins
		return true;
	}
	return false;
}