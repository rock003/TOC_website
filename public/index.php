<?php	

require_once("../applications/controllers/Controller.php");
require_once("../applications/controllers/Page_controller.php");
require_once("../applications/controllers/Ajax_functions.php");

require_once("../applications/models/User.class.php");
require_once("../applications/models/Database.class.php");

require_once("../applications/views/SideMenu.class.php");
require_once("../applications/views/View.php");

$url = parse_url($_SERVER["REQUEST_URI"]);
$uri = str_replace("/", "", $url["path"]);
//parse_str($_SERVER["QUERY_STRING"], $args);

$controller = new Controller($uri);