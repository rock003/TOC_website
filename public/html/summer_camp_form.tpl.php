<?php
	include("html_doctype.tpl.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Summer Camp Registration Form</title>
<?php
	include("global_head.tpl.php");
	include("google_analytics.tpl.php");
?>
</head>

<body>
<?php
	//$home_menu_active = "program";
	include("global_header.tpl.php");
?>
<div class="main_content">
	<?php
		$side_menu = new SideMenu();
		$side_menu->addItem("form");
		$side_menu->setActiveItem("form");
		echo $side_menu;
	?>	
    <div class="content_container">
   	  <div class="content">
		<iframe src="docunments/summer_camp_2012.pdf" width="800px" height="700px"></iframe>
	  </div>
    </div>
</div>
<?php
	include("global_footer.tpl.php");
?>
</body>
</html>