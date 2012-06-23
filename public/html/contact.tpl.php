<?php
	include("html_doctype.tpl.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Contact</title>
<?php
	include("global_head.tpl.php");
?>

<style>
.info_box { padding-bottom: 5px; width: 500px; }
.info_box.career #rounded_title { background-color: #F4AA69; }
.info_box.career #rounded_title h3 { background-color: transparent; margin-bottom: 10px; }
.info_box.career p#title { padding-bottom: 0; background-color: #F2F2F2; margin-bottom: 5px; }

.info_box.contact { float: right; width: 300px; }
.info_box.contact #rounded_title { background-color: #21409a; }
.info_box.contact #rounded_title h3 { background-color: transparent; margin-bottom: 10px; }
</style>
<?php
	include("google_analytics.tpl.php");
?>
</head>

<body>
<?php
	$home_menu_active = "contact";
	include("global_header.tpl.php");
?>
<div class="main_content">
	<?php
		include("side_banner.tpl.php");
		$side_menu = new SideMenu();
		$side_menu->addItem("contact");
		$side_menu->setActiveItem("contact");
		echo $side_menu;
	?>	
    <div class="content_container">
   	  <div class="content">
		<div class="info_box contact rounded_box">
			<div id="rounded_title"><h3>Contact Information</h3></div>
			<img src="images/logo.png" style="float: right; margin-right: 5px;" width="100px" height="170px" />
			<p id="title">Inquiries / Registration:</p>
			<p>604-603-3008</p>
			<span style="margin: 0 0 10px 10px; display: inline-block;"><a href="mailto:admin.toc@gmail.com">admin.toc@gmail.com</a></span>
		</div>
        <div class="info_box career rounded_box">
			<div id="rounded_title"><h3>Career</h3></div>
			<p>We have the following openings: <br /><br />(1) Mandarin Instructor / Teaching Assitant (Wednesday afternoon / Saturday)<br />(2) Cantonese Instructor / Teaching Assistant (Saturday morning)<br /><br />Energetic and self-motivated individuals are required to fill the position. The responsibilities of Instructor / Teaching Assistant will include language instruction with creative approaches and hands-on involvement in the class operation. Success in this role will require interpersonal skills in a team environment. A teaching degree / ECE diploma and experience with children will be a strong asset. Interested applicants email resume to: <a href="mailto:admin.toc@gmail.com">admin.toc@gmail.com</a></p>
		</div>
	  </div>
    </div>
</div>
<?php
	include("global_footer.tpl.php");
?>
</body>
</html>