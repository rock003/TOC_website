<?php
	include("html_doctype.tpl.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Login</title>
<?php
	include("global_head.tpl.php");
?>

<script type="text/javascript">
		$(document).ready(function(){
		
		});
</script>

<style>
#user_login label { width: 70px; margin-right: 10px; display: inline-block; }
#message { color:#F00; display: block; margin-bottom: 10px; }
</style>
</head>

<body>
<?php
	include("global_header.tpl.php");
?>
<div class="main_content">
	<?php
		$side_menu = new SideMenu();
		$side_menu->addItem("login");
		$side_menu->setActiveItem("login");
		echo $side_menu;
	?>	
    <div class="content_container">
   	  <div class="content">
      	<form id="user_login" method="post">
        	<div id="message"><?php echo $vars["msg"]; ?></div>
        	<label>User name</label><input type="text" name="userName" />
            <br /><br />
            <label>Password</label><input type="password" name="password" />
            <br /><br />
            <input type="submit" value="Login" name="login" />
        </form>
      </div>
    </div>
</div>
<?php
	include("global_footer.tpl.php");
?>
</body>
</html>