<?php
	include("html_doctype.tpl.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Home</title>
<?php
	include("global_head.tpl.php");
?>
<link rel='stylesheet' type='text/css' href='css/fullcalendar.css' />
<link rel='stylesheet' type='text/css' href='css/theme.css' />
<script type='text/javascript' src='scripts/fullcalendar.min.js'></script>

<script type="text/javascript">
		$(document).ready(function(){
			var photos = new Array("images/Teaching Team 2011_2012.jpg", "images/Annual Performance 2012.jpg", "images/Teaching Team 2010_2011.jpg", "images/Cantonese Team 2009_2010.jpg", "images/Mandarin Team 2009_2010.jpg", "images/TOC Banner.jpg", "images/Student Works.jpg", "images/2011 Cantonese Level 2.jpg", "images/Class Activity.jpg", "images/2006 Cantonese Class.jpg");
			var slider = new photo_slider(photos, 7000, "photos");
			slider.start();
			
			//photos slide show
			$(".photos").hover(function() {
					slider.end();
					$(this).find(".caption").show("clip", { direction: "vertical" }, 500);
				}, function(){
					slider.start();
					$(this).find(".caption").hide("clip", { direction: "vertical" }, 500);
			});
			
			var date = new Date();
			var d = date.getDate();
			var m = date.getMonth();
			var y = date.getFullYear();
			$('#calendar').fullCalendar({
				theme: true,
				header: {
					left: 'title',
					center: '',
					right: 'prev,next'
				},
				titleFormat: {
					month: 'MMMM yyyy'
				},
				weekMode: 'variable',
				height: 300,
				events: {
					url: 'ajax_calendar_event',
					cache: true
				},
				eventMouseover: function(calEvent, jsEvent, view){
					
				},
				eventMouseout: function(calEvent, jsEvent, view){
					
				}
			});
		});
</script>

<style>
/****************************** photo slider **********************************************/
.photos{}
	.photos { position: relative; width: 545px; height: 414px; padding: 5px; }
	.photos img { width: 525px; height: 394px; position: absolute; top: 5px; left: 5px; }
	.photos .caption { position: absolute; bottom: 25px; width: 525px; height: 40px; background-color: #000000; color: #FFFFFF; font-size: 14px; opacity: 0.50; filter: alpha(opacity=50); }
	.photos .caption p { margin: 10px 10px 0px 10px; }
	.photos .caption #page_number { float: right; }
	
#calendar { overflow: hidden; width: 543px; float: left; }
#yearbook_link { float: right; margin-top: 10px; }
#yearbook_link img { border: none; }
#yearbook_link a { outline: none; }

.info_box.info { float: right; width: 270px; min-height: 395px; margin-top: 5px; }
.info_box.info #rounded_title { background-color: #21409a; }
.info_box.info #rounded_title h3 { background-color: transparent; margin-bottom: 10px; }
</style>
<?php
	include("google_analytics.tpl.php");
?>
</head>

<body id="body_home">
<?php
	$home_menu_active = "home";
	include("global_header.tpl.php");
?>
<div class="main_content">
	<?php
		include("side_banner.tpl.php");
		$side_menu = new SideMenu();
		$side_menu->addItem("home");
		$side_menu->addItem("about", "", "", "/about");
		$side_menu->setActiveItem("home");
		echo $side_menu;
	?>	
    <div class="content_container">
   	  <div class="content">
        	<div class="home_page">
				<div class="info_box info rounded_box">
					<div id="rounded_title"><h3>News and Events</h3></div>
					<p id="title">Saturday Cantonese / Mandarin Program</p>
					<p>TOC Saturday Cantonese / Mandarin Program is now accepting registration for school year 2012-13. Sign up your child to an innovative and interactive program. Through our theme-based curriculum, students learn Chinese language and culture step by step. Creative activities are incorporated. Go to <a href="/reg_form">registration</a>.</p>
					<p id="title">Weekday Mandarin Program</p>
					<p>For Stratford Hall students only. Go to <a href="/weekday_form">registration.</a></p>
				</div>
				<div class="photos"></div>
				<div id='calendar'></div>
                <div id="yearbook_link"><a href="about"><img src="images/yearbook_link.png" /></a></div>
            </div>
      </div>
    </div>
</div>
<?php
	include("global_footer.tpl.php");
?>
</body>
</html>