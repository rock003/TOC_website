<?php
	include("html_doctype.tpl.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Resources</title>
<?php
	include("global_head.tpl.php");
?>
<script type="text/javascript" src="scripts/jquery.jcarousel.min.js"></script>
<script type="text/javascript">
	function mycarousel_initCallback(carousel){
		carousel.options.scroll = $.jcarousel.intval(3);
		
		$('.unit_slider .arrow.right_arrow').click(function() {
			carousel.next();
			return false;
		});

		$('.unit_slider .arrow.left_arrow').click(function() {
			carousel.prev();
			return false;
		});
	}
	$(document).ready(function(){
		$('#sat_man_basics').jcarousel({
			initCallback: mycarousel_initCallback,
			buttonNextHTML: null,
			buttonPrevHTML: null
		});
		
		$(".unit_slider li").click(function(){
			var self = $(this);
			var player = self.parents(".unit_slider").siblings(".audio_player");
			
			player[0].pause();
			
			player.find(".mp3_file").attr("src", "files/" + self.parent("ul").attr("id") + "/" + self.data("file-name") + ".mp3");
			player.find(".ogg_file").attr("src", "files/" + self.parent("ul").attr("id") + "/" + self.data("file-name") + ".ogg");
			player.find(".embed_file").attr("src", "files/" + self.parent("ul").attr("id") + "/" + self.data("file-name") + ".mp3");

			player[0].load();
		});
	});
</script>

<style>
.class_block audio {
	display: block;
	margin: 10px auto;
}
h2.class_title {
	color: #21409A;
}
.unit_slider {
	margin-top: 10px;
	position: relative;
	padding: 0 60px;
}

.unit_slider .arrow {
	display: block;
	width: 50px;
	height: 50px;
	position: absolute;
	top: 12px;
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
				<div class="class_block" data-class-name="mandarin_basics">
					<h2 class="class_title">Saturday Mandarin Basics</h2>
					<audio controls="controls" height="100" width="100" class="audio_player">
					  <source src="files/sat_man_basics/unit1.mp3" type="audio/mp3" class="mp3_file">
					  <source src="files/sat_man_basics/unit1.ogg" type="audio/ogg" class="ogg_file">
					  <embed height="100" width="100" src="files/sat_man_basics/unit1.mp3" class="embed_file">
					</audio>
					<div class="unit_slider">
						<span class="arrow left_arrow"></span>
						<span class="arrow right_arrow"></span>
						<ul id="sat_man_basics" class="jcarousel-skin-tango">
							<li data-file-name="unit1">
								<img src="images/audio_icon.png" width="70" height="70" />
								<p>Unit 1</p>
							</li>
							<li data-file-name="unit2">
								<img src="images/audio_icon.png" width="70" height="70" />
								<p href="javascript:void(0);">Unit 2</p>
							</li>
							<li>
								<img src="images/audio_icon.png" width="70" height="70" />
								<p href="javascript:void(0);">Unit 3</p>
							</li>
							<li>
								<img src="images/audio_icon.png" width="70" height="70" />
								<p href="javascript:void(0);">Unit 4</p>
							</li>
							<li>
								<img src="images/audio_icon.png" width="70" height="70" />
								<p href="javascript:void(0);">Unit 5</p>
							</li>
							<li>
								<img src="images/audio_icon.png" width="70" height="70" />
								<p href="javascript:void(0);">Unit 6</p>
							</li>
							<li>
								<img src="images/audio_icon.png" width="70" height="70" />
								<p href="javascript:void(0);">Unit 7</p>
							</li>
							<li>
								<img src="images/audio_icon.png" width="70" height="70" />
								<p href="javascript:void(0);">Unit 8</p>
							</li>
							<li>
								<img src="images/audio_icon.png" width="70" height="70" />
								<p href="javascript:void(0);">Unit 9</p>
							</li>
							<li>
								<img src="images/audio_icon.png" width="70" height="70" />
								<p href="javascript:void(0);">Unit 10</p>
							</li>
							<li>
								<img src="images/audio_icon.png" width="70" height="70" />
								<p href="javascript:void(0);">Unit 11</p>
							</li>
							<li>
								<img src="images/audio_icon.png" width="70" height="70" />
								<p href="javascript:void(0);">Unit 12</p>
							</li>
							<li>
								<img src="images/audio_icon.png" width="70" height="70" />
								<p href="javascript:void(0);">Unit 13</p>
							</li>
							<li>
								<img src="images/audio_icon.png" width="70" height="70" />
								<p href="javascript:void(0);">Unit 14</p>
							</li>
							<li>
								<img src="images/audio_icon.png" width="70" height="70" />
								<p href="javascript:void(0);">Unit 15</p>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
<?php
	include("global_footer.tpl.php");
?>
</body>
</html>