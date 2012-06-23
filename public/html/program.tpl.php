<?php
	include("html_doctype.tpl.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Programs</title>
<?php
	include("global_head.tpl.php");
?>

<style>
.program_info { float: right; width: 300px; }
.program_info .info_box { width: 300px; }
.program_info .info_box.rounded_box #rounded_title { background-color: #21409a; }
.program_info .info_box h3 { background-color: transparent; margin-bottom: 5px; }

.info_box { float: left; width: 500px; }
.info_box.rounded_box #rounded_title { background-color: #f4aa69; }
.info_box.rounded_box #rounded_title h3 { background-color: transparent; }

#side_img { padding: 0 0 10px 10px; }
</style>
<?php
	include("google_analytics.tpl.php");
?>
</head>

<body>
<?php
	$home_menu_active = "program";
	include("global_header.tpl.php");
?>
<div class="main_content">
	<?php
		include("side_banner.tpl.php");
		$side_menu = new SideMenu();
		$side_menu->addItem("programs");
		$side_menu->setActiveItem("programs");
		echo $side_menu;
	?>	
    <div class="content_container">
   	  <div class="content">
        	<div class="program_info">
            	<div class="info_box rounded_box">
                	<div id="rounded_title"><h3>General Information</h3></div>
                    <p>TOC Chinese Program is a dynamic and practical approach to learning Cantonese/Mandarin with up-to-date "theme-based" curriculum. Explore the language and culture through activities such as games, songs, stories, crafts and etc. Teaching medium is both English and Cantonese/Mandarin. Regular weekly classes are mainly scheduled for children between 4 and 16.</p>
					<img id="side_img" src="images/cantonese_class.jpg" width="280px" height="210px" />
				</div>
                <div class="info_box rounded_box">
               		<div id="rounded_title"><h3>How to register</h3></div>
                	<p>Click <a href="/reg_form">here</a> to access the Registration Form<br /><b>Phone: </b>604-603-3008</p>
                    <p>Special classes can be formed upon request for teenagers and adults.</p>
                </div>
           </div>
           <div class="info_box rounded_box">
                	<div id="rounded_title"><h3>Cantonese for Children and Youth (2011-2012)</h3></div>
                    <p id="title">Time:</p>
                    <p>Saturday morning (aged 4 to 16)</p>
                    <p id="title">Location:</p>
                    <p>Stratford Hall @3000 Commercial Drive, Vancouver</p>
                    <p id="title">Classes:</p>
                    <p>Basics to Level 4</p>
                    <p id="title">Time:</p> 
                    <p>10:00 am to 12:00 pm</p>
           </div>
            <div class="info_box rounded_box">
            	<div id="rounded_title"><h3>Mandarin for Children and Youth (2011-2012)</h3></div>
                <p id="title">Time:</p>
                <p>Saturday morning (aged 4 to 16)</p>
                <p id="title">Location:</p>
                <p>Stratford Hall @3000 Commercial Drive, Vancouver</p>
                <p id="title">Classes:</p>
                <p>Basics to Level 6</p>
                <p id="title">Time:</p>
                <p>10:00 am to 12:00 pm</p>
				<p>12:45 pm to 2:45 pm</p>
            </div>
			<div class="info_box rounded_box">
                	<div id="rounded_title"><h3>Cantonese Workshop for Bi-lingual Parents</h3></div>
                    <p id="title">Time:</p>
                    <p>Monday afternoon 1:00 pm-2:45 pm</p>
                    <p id="title">Info:</p>
                    <p>A fun-filled workshop for bi-lingual parents (English and Cantonese) is running every Monday morning.  Focus on daily conversation and the exploration of Chinese culture. Help you communicate effectively with your Chinese-speaking family members, and provide resources to develop a bi-lingual learning environment for your children. Enjoy and have fun. If enough interest is shown, customized classes will be tailor made for your needs at your preferred locations.</p>
        	</div>
     	</div>
    </div>
</div>
<?php
	include("global_footer.tpl.php");
?>
</body>
</html>