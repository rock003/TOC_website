<?php
	include("html_doctype.tpl.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>About</title>
<?php
	include("global_head.tpl.php");
?>

<script type="text/javascript">
		$(document).ready(function(){
			$("img.lazy").lazyload();
			
			//calculate offset for hover images, extend content height if needed
			$(".yearbooks .page").hover(function(){
				var img_offset = $(this).find("#hover_img").offset().top;
				var div_height = $(".yearbook").height();
				var difference = div_height - img_offset;
				if(difference < 420){
					var new_height = div_height + (420 - difference);
					$(".yearbook").css("height", new_height+"px");
				}
				$("img.lazy2", this).lazyload();
			},
			function(){
				$(".yearbook").css("height", "auto");
			});
			
			//button function to show / hide contents from a yearbook
			$(".orange_btn").click(function(){
				var id = "#" + $(this).parent().parent().attr("id");	//get the grandparent id
				if($(id).children(".yearbook_content").hasClass("shown")){	//if already shown then hide it
					$(id).children(".yearbook_content").removeClass("shown").slideUp("fast");
					$(this).children("span").html("Show Pages");
				} else{		//show the content
					$(id).children(".yearbook_content").addClass("shown").slideDown("fast");
					$(this).children("span").html("Hide Pages");
					$(this).scroll();
				}
			});
			
			$(".yearbooks .page").click(function(){
				var body_height = $("#about").height();
				$(".black_bg").css("height", body_height);	//update the height of the black background
				$(".black_bg").show();
				
				var top = 10 + $(window).scrollTop();	//calculate the height to put the overlay
				$(".gallery_overlay").css("top", top);
				
				var current_img = $("#hover_img img", this);
				var current_index = 0; 
				
				//calculate new image size base on the hover image width and height and new width
				var height = current_img.attr("height").replace("px", "");
				var width = current_img.attr("width").replace("px", "");
				var new_width = 520;		//new width
				var new_height = Math.floor((height/width) * new_width);
				
				$(this).parent().children('.page').each(function(i){
					//clone the img tag and put it into image_holder
					var img = $("#hover_img img", this).clone();
					img.attr("src", img.attr("data-original"));
					img.attr("height", new_height);
					img.attr("width", new_width);
					img.removeClass("lazy").removeAttr("data-original");
					$(".gallery_overlay .image_holder").append(img);
					
					if(current_img.attr("data-original") == img.attr("src")){
						current_index = i;
					}
				});
				
				//set the overlay to a new width and height
				$(".gallery_overlay").css("height", new_height + 20);
				$(".gallery_overlay").css("width", new_width + 20);
				
				$(".gallery_overlay").fadeIn("slow");
				
				$(".gallery_overlay .image_holder").cycle({ 
					fx: 'scrollHorz',
					prev:   '#left_btn',
    				next:   '#right_btn',
					startingSlide: current_index,
    				timeout: 0
				});
			});
			
			//close the overlay
			$(".close_button").click(function(){
				$(".gallery_overlay").fadeOut();
				$(".black_bg").hide();
				$(".gallery_overlay .image_holder").empty();
			});
		});
</script>

<style>
.about_box { float: right; width: 300px; }
.about_box.rounded_box #rounded_title { background-color: #21409a; }
.about_box h3 { background-color: transparent; margin-bottom: 5px; }
.about_box p { padding-left: 10px; color: #3B5998; }

.yearbook { float: left; width: 500px; }
.yearbook.rounded_box #rounded_title { background-color: #f4aa69; }
.yearbook.rounded_box #rounded_title h3 { background-color: transparent; }

#fb_badge { padding-left: 10px; margin-bottom: 10px; }

.yearbooks { padding-left: 10px; padding-bottom: 10px; }
.yearbooks .yearbook_cover { overflow: hidden; padding: 3px 0 8px 0; }
.yearbooks .yearbook_cover img { float: left; box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3); }
.yearbooks .yearbook_content { padding-top: 10px; margin: 0 10px 10px 0; display: none; }
.yearbooks .yearbook_cover #title { display: block; float: left; margin-left: 10px; color: #4264C7; }
.yearbooks .page { float: left; margin: 0 10px 10px 0; cursor: pointer; position: relative; z-index: 50; }
.yearbooks .page:hover { z-index: 100; }
.yearbooks .page #hover_img { background-color: #4264c7; padding: 3px; visibility: hidden; position: absolute; left: -2000px; }
.yearbooks .page:hover #hover_img { top: 30px; left: 40px; visibility: visible; overflow: visible; }
.yearbooks .page #discription { display: block; text-align: center; margin-top: 5px; }
.yearbooks .orange_btn { float: left; margin-left: 10px; margin-top: 5px; }

.blue_divider { margin: 10px 10px 10px 0; }
.back_to_top_btn { clear: both; } 

#about .black_bg { display: none; background-color: #000000; position:absolute; top: 0px; left: 0px; width: 100%; opacity: 0.80; filter: alpha(opacity=80); z-index: 1000; }
#about .gallery_overlay { display: none; background: none repeat scroll 0 0 padding-box #fff; position: absolute; left: 0px; right: 0px; top: 150px; margin: 0 auto; width: 520px; height: 650px; z-index: 2000; box-shadow: 0 0 20px rgba(255, 255, 255, 0.5); border: 8px solid transparent; } 
#about .gallery_overlay .close_button { background: url("images/all.png") 0 -42px no-repeat; width: 35px; height: 35px; position: absolute; top: 0; right: 0; cursor: pointer; z-index: 1000; }
#left_btn, #right_btn { background-color:#CCCCCC; height: 200px; width: 30px; opacity: 0.20; filter: alpha(opacity=20); z-index: 500; }
#left_btn:hover, #right_btn:hover { opacity: 0.80; filter: alpha(opacity=80); }
#left_btn { position: absolute; top: 240px; left: 0; cursor: pointer; }
#right_btn { position: absolute; top: 240px; right: 0; cursor: pointer; }
#left_btn span { background: url("images/all.png") 0 -171px no-repeat; width: 20px; height: 33px; display: block; margin: 84px 0 0 5px; }
#right_btn span { background: url("images/all.png") 0  -133px no-repeat; width: 20px; height: 33px; display: block; margin: 84px 0 0 5px; }
.image_holder { margin: 10px 0 0 10px; }
</style>
<?php
	include("google_analytics.tpl.php");
?>
</head>

<body id="about">
<div class="black_bg"></div>
<div class="gallery_overlay">
	<div class="image_holder"></div>
    <div id="left_btn"><span></span></div>
    <div id="right_btn"><span></span></div>
	<div class="close_button"></div>
</div>
<?php
	//$home_menu_active = "home";
	include("global_header.tpl.php");
?>
<div class="main_content">
	<?php
		include("side_banner.tpl.php");
		$side_menu = new SideMenu();
		$side_menu->addItem("home", "", "", "/home");
		$side_menu->addItem("about");
		$side_menu->setActiveItem("about");
		echo $side_menu;
	?>	
    <div class="content_container">
   	  <div class="content">
		<div class="about_box info_box rounded_box">
        	<div id="rounded_title"><h3>About Us</h3></div>
            <img src="images/slogan.png" style="margin: 5px 0 10px 10px;"/>
            <p>TOC education resources was founded and established in 2002. We provide culture and custom-made language programs for individuals and groups. Whether it is for family communication or personal enrichment, business or travel, we can design a program to meet your specific needs. We serve from kids to adults, from business professionals to retired seniors.</p>
            <p style="padding-bottom: 3px;"><b>Our Facebook page: </b></p>
            <div id="fb_badge">
            	<!-- Facebook Badge START --><a href="http://www.facebook.com/pages/TOC-Education-Resources-%E6%8B%93%E6%80%9D%E6%95%99%E8%82%B2%E8%B3%87%E6%BA%90%E4%B8%AD%E5%BF%83/232077693492188" target="_TOP" style="font-family: &quot;lucida grande&quot;,tahoma,verdana,arial,sans-serif; font-size: 11px; font-variant: normal; font-style: normal; font-weight: normal; color: #3B5998; text-decoration: none;" title="TOC Education Resources 拓思教育資源中心">TOC Education Resources 拓思教育資源中心</a><br/><a href="http://www.facebook.com/pages/TOC-Education-Resources-%E6%8B%93%E6%80%9D%E6%95%99%E8%82%B2%E8%B3%87%E6%BA%90%E4%B8%AD%E5%BF%83/232077693492188" target="_TOP" title="TOC Education Resources 拓思教育資源中心"><img src="http://badge.facebook.com/badge/232077693492188.2727.662113337.png" style="border: 0px; margin-top: 3px;" /></a><br/><a href="http://www.facebook.com/business/dashboard/" target="_TOP" style="font-family: &quot;lucida grande&quot;,tahoma,verdana,arial,sans-serif; font-size: 11px; font-variant: normal; font-style: normal; font-weight: normal; color: #3B5998; text-decoration: none;" title="Make your own badge!"></a><!-- Facebook Badge END -->
            </div>
        </div>
   		<div class="yearbook info_box rounded_box">
            <div id="rounded_title"><h3>Yearbooks</h3></div>
            <p style="color: #3B5998; margin-top: 5px;">Take a look at our yearbooks to find out more about our classes...<br />Hover on any page to enlarge, or click on it to open scroll view.</p>
            <div class="yearbooks">
            	 <div id="yearbook_2011" style="clear: both;">
                	<div class="yearbook_cover">
                    	<img src="images/yearbook_2011/cover.jpg" width="150px" height="194px" />
                        <span id="title">2010 - 2011 Yearbook</span>
                        <br />
                        <div class="orange_btn"><span>Show Pages</span></div>
                    </div>
                    <div class="yearbook_content">
                    	<?php
							for($i=2; $i <= 31; $i++){
								echo '<div class="page"><img class="lazy" src= "images/lazy_loading_holder.jpg" data-original="images/yearbook_2011/page_'.$i.'.jpg" width="150px" height="194px"/><span id="discription">Page '.$i.'</span><span id="hover_img"><img class="lazy2" src= "images/lazy_loading_holder.jpg" data-original="images/yearbook_2011/page_'.$i.'.jpg" width="420px" height="543px" /></span></div>';
							}
						?>
                        <div class="page"><img class="lazy" src= "images/lazy_loading_holder.jpg" data-original="images/yearbook_2011/back_cover.jpg" width="150px" height="194px"/><span id="discription">Back Cover</span><span id="hover_img"><img class="lazy" src= "images/lazy_loading_holder.jpg" data-original="images/yearbook_2011/back_cover.jpg" width="420px" height="543px" /></span></div>
                    </div>
                </div>
                <div class="blue_divider"></div>
                <div id="yearbook_2010" style="clear: both;">
                    <div class="yearbook_cover">
                    	<img src="images/yearbook_2010/front_cover.jpg" width="150px" height="194px" />
                        <span id="title">2009 - 2010 Yearbook</span>
                        <br />
                        <div class="orange_btn"><span>Show Pages</span></div>
                    </div>
                    <div class="yearbook_content">
                    	<?php
							for($i=2; $i <= 23; $i++){
								echo '<div class="page"><img class="lazy" src= "images/lazy_loading_holder.jpg" data-original="images/yearbook_2010/page_'.$i.'.jpg" width="150px" height="188px"/><span id="discription">Page '.$i.'</span><span id="hover_img"><img class="lazy2" src= "images/lazy_loading_holder.jpg" data-original="images/yearbook_2010/page_'.$i.'.jpg" width="420px" height="525px" /></span></div>';
							}
						?>
                        <div class="page"><img class="lazy" src= "images/lazy_loading_holder.jpg" data-original="images/yearbook_2010/back_cover.jpg" width="150px" height="188px"/><span id="discription">Back Cover</span><span id="hover_img"><img class="lazy" src= "images/lazy_loading_holder.jpg" data-original="images/yearbook_2010/back_cover.jpg" width="420px" height="525px" /></span></div>
                    </div>
                </div>
                <div class="blue_divider"></div>
                <div id="yearbook_2009" style="clear: both;">
                    <div class="yearbook_cover">
                    	<img src="images/yearbook_2009/front_cover.jpg" width="150px" height="194px" />
                        <span id="title">2008 - 2009 Yearbook</span>
                        <br />
                        <div class="orange_btn"><span>Show Pages</span></div>
                    </div>
                    <div class="yearbook_content">
                    	<?php
							for($i=2; $i <= 23; $i++){
								echo '<div class="page"><img class="lazy" src= "images/lazy_loading_holder.jpg" data-original="images/yearbook_2009/page_'.$i.'.jpg" width="150px" height="188px"/><span id="discription">Page '.$i.'</span><span id="hover_img"><img class="lazy2" src= "images/lazy_loading_holder.jpg" data-original="images/yearbook_2009/page_'.$i.'.jpg" width="420px" height="525px" /></span></div>';
							}
						?>
                        <div class="page"><img class="lazy" src= "images/lazy_loading_holder.jpg" data-original="images/yearbook_2009/back_cover.jpg" width="150px" height="188px"/><span id="discription">Back Cover</span><span id="hover_img"><img class="lazy" src= "images/lazy_loading_holder.jpg" data-original="images/yearbook_2009/back_cover.jpg" width="420px" height="525px" /></span></div>
                    </div>
                </div>
                <div class="blue_divider"></div>
                <div id="yearbook_2008" style="clear: both;">
                    <div class="yearbook_cover">
                    	<img src="images/yearbook_2008/front_cover.jpg" width="150px" height="194px" />
                        <span id="title">2007 - 2008 Yearbook</span>
                        <br />
                        <div class="orange_btn"><span>Show Pages</span></div>
                    </div>
                    <div class="yearbook_content">
                    	<?php
							for($i=2; $i <= 23; $i++){
								echo '<div class="page"><img class="lazy" src= "images/lazy_loading_holder.jpg" data-original="images/yearbook_2008/page_'.$i.'.jpg" width="150px" height="188px"/><span id="discription">Page '.$i.'</span><span id="hover_img"><img class="lazy2" src= "images/lazy_loading_holder.jpg" data-original="images/yearbook_2008/page_'.$i.'.jpg" width="420px" height="525px" /></span></div>';
							}
						?>
                    </div>
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