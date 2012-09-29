<?php
function student_gallery($year){
	$DB = Database::getInstance();
	
	$location = "images/student_gallery/".$year;
	$query = $DB->query("SELECT * FROM files WHERE Location='%s' ORDER BY display_order ASC", $location);
	
	while($result = $DB->query_fetch_array($query)){
		$images[] = array($result["location"]."/".$result["name"], $result["description"]);
	}
	
	if($images){
		foreach($images as $index => $image){
			if($index == 0){
				$image_content[] = '<img class="rounded-img active" src="'.$image[0].'" alt="'.$image[1].'" />';
			} else{
				$image_content[] = '<img class="rounded-img" src="'.$image[0].'" alt="'.$image[1].'" />';
			}
			$image_slide_content[] = '<img src="'.$image[0].'" /> ';
		}
	}
	
	echo json_encode(array($image_content, $image_slide_content));
}

function student_info($u_id){
	$DB = Database::getInstance();
	
	$query_user = $DB->query("SELECT * FROM user WHERE u_id='%d'", $u_id);
	while($result_user = $DB->query_fetch_array($query_user)){
		$user = $result_user;
	}
	
	$class = get_class_by_uid($u_id);
	
	unset($user["userName"]);
	unset($user["password"]);
	
	echo json_encode(array($user, $class));
}

function student_update($student){
	$DB = Database::getInstance();
	
	if($_POST["u_id"]){
		$str = "";
		foreach($student as $index => $value){
			if($index != "u_id"){
				$str .= $index."='".$value."',";
			}
		}
		$query = $DB->query("UPDATE user SET ".substr($str, 0, -1)." WHERE u_id='%d'", $_POST["u_id"]);
	} else{
		$query = $DB->query("INSERT INTO user (firstName, lastName, chineseName, phoneNumber, address, fatherName, motherName, fatherPhone, motherPhone, fatherEmail, motherEmail, allergy, remark) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", $_POST["firstName"], $_POST["lastName"], $_POST["chineseName"], $_POST["phoneNumber"], $_POST["address"], $_POST["fatherName"], $_POST["motherName"], $_POST["fatherPhone"], $_POST["motherPhone"], $_POST["fatherEmail"], $_POST["motherEmail"], $_POST["allergy"], $_POST["remark"]);
	}
	
	echo json_encode("success");
}

function filter_class($values){
	$DB = Database::getInstance();
	
	if($values["class"] != "all"){
		$query = $DB->query("SELECT u.* FROM user u LEFT JOIN user_role ur ON u.u_id=ur.u_id LEFT JOIN user_class uc on u.u_id=uc.u_id LEFT JOIN class c ON uc.c_id=c.c_id WHERE ur.r_id=3 AND c.name='%s' AND uc.year='%s' ORDER BY u.firstName ASC", $values["class"], $values["year"]);
	} else {
		$query = $DB->query("SELECT u.* FROM user u LEFT JOIN user_role ur ON u.u_id=ur.u_id WHERE ur.r_id=3 ORDER BY u.firstName ASC");
	}
	
	while($result = $DB->query_fetch_array($query)){
		$user[] = '<span value="'.$result["u_id"].'">'.$result["firstName"]." ".$result["lastName"].'</span>';
	}
	
	echo json_encode($user);
}

function add_class($values){
	$DB = Database::getInstance();
	
	$query = $DB->query("SELECT * FROM user_class WHERE u_id=%d AND c_id=%d AND year='%s'", $values["u_id"], $values["c_id"], $values["year"]);
	if($DB->query_get_num_row($query) == 0){
		$query = $DB->query("INSERT INTO user_class VALUES(%d, %d, '%s')", $values["u_id"], $values["c_id"], $values["year"]);
		
		$class = get_class_by_uid($values["u_id"]);
		
		echo json_encode(array("status" => "success", "list" => $class));
	} else{
		echo json_encode(array("status" => "fail"));
	}
}

function delete_class($values){
	$DB = Database::getInstance();
	
	$query = $DB->query("DELETE FROM user_class WHERE u_id=%d AND c_id=%d AND year='%s'", $values["u_id"], $values["c_id"], $values["year"]);
	
	$class = get_class_by_uid($values["u_id"]);
	
	echo json_encode($class);
}

function calendar_event($args){
	$DB = Database::getInstance();
	
	$start = $args["start"];
	$end = $args["end"];
	
	$query = $DB->query("SELECT * FROM event WHERE start >= %d AND end <= %d", $start, $end);
	while($result = $DB->query_fetch_array($query)){
		$events[] = array("title" => $result["title"], "description" => $result["description"], "start" => $result["start"], "end" => $result["end"]);
	}
	
	echo json_encode($events);
}

/*************************** non ajax function ******************************************/

//get the class name, year and id from db with given user id
function get_class_by_uid($u_id){
	$DB = Database::getInstance();
	$class = array();
	
	$query_class = $DB->query("SELECT c.name, uc.year, uc.c_id FROM class c LEFT JOIN user_class uc ON c.c_id=uc.c_id WHERE uc.u_id=%d ORDER BY uc.year DESC", $u_id);
	while($result_class = $DB->query_fetch_array($query_class)){
		$class[] = $result_class;
	}
	
	return $class;
}
