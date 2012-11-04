<?php
	include("html_doctype.tpl.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Resources</title>
<?php
	include("global_head.tpl.php");
	$man_class_block_arr = array(
							 "sat_man_basics" => array("Mandarin Basics", 15), 
							 "sat_man_level1" => array("Mandarin Level 1", 15),
							 "sat_man_level2" => array("Mandarin Level 2", 0),
							 "sat_man_level3" => array("Mandarin Level 3", 0),
							 "sat_man_level4" => array("Mandarin Level 4", 0));
	$can_class_block_arr = array(
							 "sat_can_basics" => array("Saturday Cantonese Basics", 15),
							 "sat_can_level1" => array("Saturday Cantonese Level 1", 0),
							 "sat_can_level2" => array("Saturday Cantonese Level 2", 0),
							 "sat_can_level3" => array("Saturday Cantonese Level 3", 0),
							 "sat_can_level4" => array("Saturday Cantonese Level 4", 0));
?>
<script type="text/javascript" src="scripts/jquery.jcarousel.min.js"></script>
<script type="text/javascript">
	function hz_acr_init(elem, title_width, content_width){
		var left_pos = 0;
		elem.children(".class_block:first-child").addClass("active");
		
		elem.children(".class_block").each(function(index){
			if(index == 0){
				//do nothing
			} else if (index == 1){
				left_pos = title_width + content_width + 2;
				$(this).css("left", left_pos);
			} else {
				left_pos = left_pos + title_width + 2;	//2 is border
				$(this).css("left", left_pos);
			}
		});
	}
	
	$(document).ready(function(){
		var content_width = 470;
		
		hz_acr_init($(".hz_acr_wrapper.mandarin"), 50, content_width);
		hz_acr_init($(".hz_acr_wrapper.cantonese"), 50, content_width);
		var animate_end = true;
		
		$(".files").click(function(){
			var self = $(this);
			var player = self.parents(".file_content_wrapper").siblings(".audio_player");
			
			self.siblings(".active").removeClass("active");
			self.addClass("active");
			
			player[0].pause();
			
			player.find(".mp3_file").attr("src", "files/" + self.data("file-name") + ".mp3");
			player.find(".ogg_file").attr("src", "files/" + self.data("file-name") + ".ogg");
			player.find(".embed_file").attr("src", "files/" + self.data("file-name") + ".mp3");

			player[0].load();
			player[0].play();
		});
		
		$(".title").click(function(){
			var _self = $(this);
			var _parent = $(this).parent();
			
			if(!animate_end){
				return false;
			}
			
			if(_parent.hasClass("active")){	//currently active, do nothing
				return false;
			} else if (_parent.prev(".class_block").hasClass("active")){	//just shift current item
				_parent.animate({
					left: '-=' + content_width
				}, 1000, function(){
					animate_end = true;
				});
				_parent.prev(".class_block").removeClass("active");
			} else if(_parent.next(".class_block").hasClass("active")){	//shift the active item
				_parent.next(".class_block").animate({
					left: '+=' + content_width
				}, 1000, function(){
					animate_end = true;
				}).removeClass("active");
			} else if(_self.parents(".hz_acr_wrapper").children(".class_block.active").data("order") > _parent.data("order")){		//active item is on the right side of current item
				var next_item = _parent.next(".class_block");
				_self.parents(".hz_acr_wrapper").children(".class_block.active").addClass("temp");
				
				while(!next_item.hasClass("active")){
					next_item.addClass("temp");
					next_item = next_item.next(".class_block");
				}
				
				_self.parents(".hz_acr_wrapper").children(".class_block.temp").animate({
					left: '+=' + content_width
				}, 1000, function(){
					animate_end = true;
				});
				
				_self.parents(".hz_acr_wrapper").children(".class_block.temp").removeClass("temp");
				_self.parents(".hz_acr_wrapper").children(".class_block.active").removeClass("active");
			} else if(_self.parents(".hz_acr_wrapper").children(".class_block.active").data("order") < _parent.data("order")){		//active item is on the left side
				_parent.addClass("temp");
				var prev_item = _parent.prev(".class_block");
				
				while(!prev_item.hasClass("active")){
					prev_item.addClass("temp");
					prev_item = prev_item.prev(".class_block");
				}
				
				_self.parents(".hz_acr_wrapper").children(".class_block.temp").animate({
					left: '-=' + content_width
				}, 1000, function(){
					animate_end = true;
				});
				
				_self.parents(".hz_acr_wrapper").children(".class_block.temp").removeClass("temp");
				_self.parents(".hz_acr_wrapper").children(".class_block.active").removeClass("active");
			}
			
			_parent.addClass("active");
			
			//var player = _self.find(".audio_player");
			//player[0].load();
		});
	});
</script>

<style>
.content p.intro {
	margin: 0 0 20px 39px;
}
.content h3 {
	margin: 0 0 7px 39px;
	color: #F4AA69;
}
.hz_acr_wrapper {
	background-color: transparent;
	border: 3px solid #a2a2a2;
	display: block;
	overflow: hidden;
	height: 350px;
	width: 730px;
	position: relative;
	margin: 0 auto 20px auto;
	font-family: "Helvetica Neue", Arial, sans-serif;
} 
.hz_acr_wrapper .class_block .class_content {
	z-index:10;
	height: 350px;
	left: 50px;
	position: absolute;
	top: 0;
	width: 470px;
	background: url("images/escheresque.png") 0 0 repeat transparent;
	border-left: 2px solid #fff;
	
}
.hz_acr_wrapper .class_block .class_content .content_wrapper {
	margin: 10px;
}
.hz_acr_wrapper .class_block .class_content .content_wrapper h3 {
	color: #fff;
}
.hz_acr_wrapper .class_block .class_content .content_wrapper .audio_player {
	margin: 10px auto 0 auto;
	display: block;
}
.hz_acr_wrapper .class_block .class_content .content_wrapper .file_content_wrapper {
	margin: 10px auto 0 auto;
	overflow: hidden;
	padding-left: 30px;
}
.hz_acr_wrapper .class_block .class_content .content_wrapper .file_content_wrapper .coming_soon {
	text-align: center;
	font-size: 30px;
	color: #fff;
	margin: 100px 0 0 -30px;
}
.hz_acr_wrapper .class_block .class_content .content_wrapper .file_content_wrapper .files.active {
	color: #fff;
}
.hz_acr_wrapper .class_block .class_content .content_wrapper .file_content_wrapper .files {
	float: left;
	margin-right: 10px;
	color: #F4AA69;
	cursor: pointer;
	width: 45px;
	height: 53px;
}
.hz_acr_wrapper .class_block .class_content .content_wrapper .file_content_wrapper .files p {
	text-align: center;
	font-size: 13px;
}
.hz_acr_wrapper .class_block .class_content .content_wrapper .file_content_wrapper .files span {
	background: url("images/audio_icon.png") 0 0 no-repeat transparent;
	margin: 0 auto 3px auto;
	display: block;
	width: 30px;
	height: 30px;
}
.hz_acr_wrapper .class_block .class_content .content_wrapper .file_content_wrapper .files.active span {
	background: url("images/audio_icon_active.png") 0 0 no-repeat transparent;
}
.hz_acr_wrapper .class_block {
	height: 350px;
	position: absolute;
	width: 50px;
}

.hz_acr_wrapper .class_block .title {
	z-index: 100;
	line-height: 50px;
	color: #21409A;
	font-weight: bold;
	background: url("images/gradient75034088.png") 0 0 repeat-y transparent; 
	left: 0;
	position: absolute;
	top: 0;
	width: 350px;
	cursor: pointer;
	-webkit-backface-visibility: hidden; /* fixes chrome bug */
	-webkit-transform: translateX(-100%) rotate(-90deg); 
	-webkit-transform-origin: right top; 
	-moz-transform: translateX(-100%) rotate(-90deg);
	-moz-transform-origin: right top; 
	-o-transform: translateX(-100%) rotate(-90deg); 
	-o-transform-origin: right top; 
	transform: translateX(-100%) rotate(-90deg); 
	transform-origin: right top;
	filter: none; 
	-ms-filter: none; 
	-ms-transform: translateX(-100%) rotate(-90deg); 
	-ms-transform-origin: right top;
}
.hz_acr_wrapper .class_block .title > span {
	display: block;
	width: 100%;
	margin-left: 10px;
	text-align: center;
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
		$side_menu->addItem("courses", "", "", "/program");
		$side_menu->addItem("resources");
		$side_menu->setActiveItem("resources");
		echo $side_menu;
	?>
	<div class="content_container">
		<div class="content">
			<p class="intro">
				To provide additional support for our students and parents, audio recordings of our book materials are offered below. 
			</p>
			
			<h3>Mandarin</h3>
			<div class="hz_acr_wrapper mandarin">
			<?php
				$index = 1;
				$content = '';
				
				foreach($man_class_block_arr as $name => $info){
					$file_content = '';
					$player = true;
					
					if($info[1] == 0){
						$file_content .= '<div class="coming_soon">Coming Soon</div>';
						$player = false;
					} else {
						for($i=1; $i<=$info[1]; $i++){
							if($i == 1){
								$file_content .= '
									<div class="files active" data-file-name="'.$name.'/unit'.$i.'">
										<span></span>
										<p>Unit '.$i.'</p>
									</div>
								';
							} else {
								$file_content .= '
									<div class="files" data-file-name="'.$name.'/unit'.$i.'">
										<span></span>
										<p>Unit '.$i.'</p>
									</div>
								';
							}
						}
					}
					$content .= '
						<div class="class_block" data-order="'.$index.'">
							<div class="title">
								<span>'.$info[0].'</span>
							</div>
							<div class="class_content">
								<div class="content_wrapper">
									<h3>'.$info[0].'</h3>
						';
					if($player){
						$content .= '
									<audio controls="controls" height="100" width="100" class="audio_player">
										<source src="files/'.$name.'/unit1.mp3" type="audio/mp3" class="mp3_file">
										<source src="files/'.$name.'/unit1.ogg" type="audio/ogg" class="ogg_file">
										<embed height="100" width="100" src="files/'.$name.'/unit1.mp3" class="embed_file">
									</audio>';
					}
					$content .= '				
									<div class="file_content_wrapper">
									'.$file_content.'
									</div>
								</div>
							</div>
						</div>
					';
					$index++;
				}
				
				echo $content;
			?>
			</div>
			
			<h3>Cantonese</h3>
			<div class="hz_acr_wrapper cantonese">
			<?php
				$index = 1;
				$content = '';
				
				foreach($can_class_block_arr as $name => $info){
					$file_content = '';
					$player = true;
					
					if($info[1] == 0){
						$file_content .= '<div class="coming_soon">Coming Soon</div>';
						$player = false;
					} else {
						for($i=1; $i<=$info[1]; $i++){
							if($i == 1){
								$file_content .= '
									<div class="files active" data-file-name="'.$name.'/unit'.$i.'">
										<span></span>
										<p>Unit '.$i.'</p>
									</div>
								';
							} else {
								$file_content .= '
									<div class="files" data-file-name="'.$name.'/unit'.$i.'">
										<span></span>
										<p>Unit '.$i.'</p>
									</div>
								';
							}
						}
					}
					$content .= '
						<div class="class_block" data-order="'.$index.'">
							<div class="title">
								<span>'.$info[0].'</span>
							</div>
							<div class="class_content">
								<div class="content_wrapper">
									<h3>'.$info[0].'</h3>
						';
					if($player){
						$content .= '
									<audio controls="controls" height="100" width="100" class="audio_player">
										<source src="files/'.$name.'/unit1.mp3" type="audio/mp3" class="mp3_file">
										<source src="files/'.$name.'/unit1.ogg" type="audio/ogg" class="ogg_file">
										<embed height="100" width="100" src="files/'.$name.'/unit1.mp3" class="embed_file">
									</audio>';
					}
					$content .= '				
									<div class="file_content_wrapper">
									'.$file_content.'
									</div>
								</div>
							</div>
						</div>
					';
					$index++;
				}
				
				echo $content;
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