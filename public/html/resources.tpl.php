<?php
	include("html_doctype.tpl.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Resources</title>
<?php
	include("global_head.tpl.php");
	/*
	$class_block_arr = array(
							 "sat_man_basics" => array("Saturday Mandarin Basics", 25), 
							 "sat_man_level1" => array("Saturday Mandarin Level 1", 25),
							 "sat_man_level2" => array("Saturday Mandarin Level 2", 25),
							 "sat_man_level3" => array("Saturday Mandarin Level 3", 25),
							 "sat_man_level4" => array("Saturday Mandarin Level 4", 25),
							 "sat_can_basics" => array("Saturday Cantonese Basics", 25),
							 "sat_can_level1" => array("Saturday Cantonese Level 1", 25),
							 "sat_can_level2" => array("Saturday Cantonese Level 2", 25),
							 "sat_can_level3" => array("Saturday Cantonese Level 3", 25),
							 "sat_can_level4" => array("Saturday Cantonese Level 4", 25));
	*/
	$class_block_arr = array(
						 "sat_man_basics" => array("Saturday Mandarin Basics", 15));
?>
<script type="text/javascript" src="scripts/jquery.jcarousel.min.js"></script>
<script type="text/javascript">
	function mycarousel_initCallback(carousel){
		var container = carousel.container;
		carousel.options.scroll = $.jcarousel.intval(3);
		
		container.parents(".unit_slider").find('.arrow.right_arrow').click(function() {
			carousel.next();
			return false;
		});

		container.parents(".unit_slider").find('.arrow.left_arrow').click(function() {
			carousel.prev();
			return false;
		});
	}
	$(document).ready(function(){
		<?php
			$js_content = '';
			foreach($class_block_arr as $name => $arr){
				$js_content .= '
					$("#'.$name.'").jcarousel({
						initCallback: mycarousel_initCallback,
						buttonNextHTML: null,
						buttonPrevHTML: null
					});
				';
			}
			
			echo $js_content;
		?>
		
		$(".unit_slider li").click(function(){
			var self = $(this);
			var player = self.parents(".unit_slider").siblings(".audio_player");
			
			player[0].pause();
			
			player.find(".mp3_file").attr("src", "files/" + self.parent("ul").attr("id") + "/" + self.data("file-name") + ".mp3");
			player.find(".ogg_file").attr("src", "files/" + self.parent("ul").attr("id") + "/" + self.data("file-name") + ".ogg");
			player.find(".embed_file").attr("src", "files/" + self.parent("ul").attr("id") + "/" + self.data("file-name") + ".mp3");

			player[0].load();
		});
		
		$(".class_block h2").click(function(){
			var content = $(this).siblings(".class_content");
			var parent = $(this).parent();
			
			if(content.hasClass("active")){
				content.removeClass("active").slideUp(700);
				parent.css("border-bottom", "2px solid #000000");
				parent.find("span.down_arrow").show(300);
				$(this).find("span").empty().text("(Click to expand)");
			} else {
				content.addClass("active").slideDown(700);
				parent.css("border-bottom", "none");
				parent.find("span.down_arrow").hide(300);
				$(this).find("span").empty().text("(Click to collapse)");
			}
		});
	});
</script>

<style>
.class_block {
	border-bottom: 2px solid #000000;
    padding-bottom: 5px;
	position: relative;
	margin-bottom: 25px;
}
.class_block .class_content {
	display: none;
	margin-top: 10px;
	overflow: hidden;
}
.class_block span.down_arrow {
	background: url("images/down_arrow.png") 0 0 no-repeat transparent;
	width: 16px;
	height: 16px;
	display: block;
	position: absolute;
	bottom: -10px;
	left: 350px;
}
.class_block audio {
	display: block;
	margin: 10px auto;
}
h2.class_title {
	color: #F4AA69;
	cursor: pointer;
	display: inline-block;
}
h2.class_title span {
	color: #a2a2a2;
	font-size: 11px;
}
.unit_slider {
	margin-top: 10px;
	position: relative;
	padding: 0 60px;
	border: 2px dashed #21409A;
	border-left: none;
	border-right: none;
	padding-top: 10px;
}

.unit_slider .arrow {
	display: block;
	width: 50px;
	height: 50px;
	position: absolute;
	top: 22px;
	z-index: 100;
	cursor: pointer;
}

.unit_slider .arrow.left_arrow {
	background: url("images/left_arrow.png") 0 0 no-repeat transparent;
	left: 0;
}

.unit_slider .arrow.right_arrow {
	background: url("images/right_arrow.png") 0 0 no-repeat transparent;
	right: 0;
}

.jcarousel-container {
	overflow: hidden;
}

.unit_slider li {
	width: 70px;
	height: 95px;
	margin-right: 8px;
	cursor: pointer;
}

.unit_slider li img {
	display: block;
}

.unit_slider li p {
	text-align: center;
	display: block;
	color: #000;
}
</style>
<?php
	include("google_analytics.tpl.php");
?>
</head>

<body id="resources">
<?php
	$home_menu_active = "program";
	include("global_header.tpl.php");
?>
	<div class="main_content">
		<?php
			include("side_banner.tpl.php");
			$side_menu = new SideMenu();
			$side_menu->addItem("programs", "", "", "/program");
			$side_menu->addItem("resources");
			$side_menu->setActiveItem("resources");
			echo $side_menu;
		?>
		<div class="content_container">
			<div class="content">
				<?php
					foreach($class_block_arr as $name => $info){
						$content = '';
						$content .= '
							<div class="class_block" data-class-name="'.$name.'">
								<h2 class="class_title">'.$info[0].' <span>(Click to expand)</span></h2>
								<div class="class_content">
									<audio controls="controls" height="100" width="100" class="audio_player">
										<source src="files/'.$name.'/unit1.mp3" type="audio/mp3" class="mp3_file">
										<source src="files/'.$name.'/unit1.ogg" type="audio/ogg" class="ogg_file">
										<embed height="100" width="100" src="files/'.$name.'/unit1.mp3" class="embed_file">
									</audio>
									<div class="unit_slider">
										<span class="arrow left_arrow"></span>
										<span class="arrow right_arrow"></span>
										<ul id="'.$name.'" class="jcarousel-skin-tango">
						';
						for($i = 1; $i <= $info[1]; $i++){
							$content .= '
								<li data-file-name="unit'.$i.'">
									<img src="images/audio_icon.png" width="70" height="70" />
									<p>Unit '.$i.'</p>
								</li>
							';
						}
						
						$content .= '
											</ul>
										</div>
									</div>
								<span class="down_arrow"></span>
							</div>			
						';
						
						echo $content;
					}
				?>
			</div>
		</div>	
	</div>
</div>
<?php
	include("global_footer.tpl.php");
?>
</body>
</html>