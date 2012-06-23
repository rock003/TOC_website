<?php
	include("html_doctype.tpl.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gallery</title>
<?php
	include("global_head.tpl.php");
?>
<script type="text/javascript">
		$(document).ready(function(){
			$("#small_display").delegate(".slideshow_btn", "click", function(){
				var height = $("#gallery").height();
				$(".black_bg").css("height", height);
				$(".black_bg").show();
				
				var top = 10 + $(window).scrollTop();	//calculate the height to put the overlay
				$(".gallery_overlay").css("top", top);
				$(".gallery_overlay").fadeIn("slow");
				
				$('.gallery_photos').cycle({ 
					fx: 'scrollRight',
					speed: 1000, 
					timeout: 3500,
					pause: 1
				});
			});
		
			$(".close_button").click(function(){
				$(".gallery_overlay").fadeOut();
				$(".black_bg").hide();
				$('.gallery_photos').cycle("stop");
			});
			
			//rounded corner image effect
			$(".rounded-img").load(function() {
				$(this).wrap(function(){
				  return '<span class="' + $(this).attr('class') + '" style="background:url(' + $(this).attr('src') + ') no-repeat center center; width: 100px; height: 75px; background-size: 100%;" />';
				});
				$(this).css("opacity","0");
			});
			
			$("#small_display").delegate(".rounded-img", "click", function(){
				var src = $(this).attr("src");
				var alt = $(this).attr("alt");
				
				$(".rounded-img.active").removeClass("active");
				$(".photo_large_view").attr("src", src);
				$(this).addClass("active");
				
				$(".photo_discription").html(alt);
			});
			
			$(".photo_large_view").attr("src", $("img.rounded-img.active").attr("src"));
			$(".photo_discription").html($("img.rounded-img.active").attr("alt"));
			
			$(".side_menu li").click(function(){
				//if same tab don't trigger ajax call
				if($(this).hasClass("no_ajax")){
					return;
				} else{
					var year = $(this).attr("id").replace("c_", "");
					$.ajax({
						type: "POST",
						url: "ajax_gallery",
						data: "year="+year,
						dataType: "JSON",
						success: function(data){
							if(data[0] == null){
								$("#small_display").html("");
								$(".gallery_photos").html("");
								$(".photo_large_view").attr("src","");
								$(".photo_discription").html("");
								return;
							}
							//clear thumbs and put new thumbs in
							$("#small_display").html("");
							$.each(data[0], function(index, value){
								$("#small_display").append(value);
							});
							
							$("#small_display").append('<br /><div class="orange_btn slideshow_btn"><span>Slideshow</span></div>');
							
							//clear slide images and put new images in
							$(".gallery_photos").html("");
							$.each(data[1], function(index, value){
								$(".gallery_photos").append(value);
							});
							
							//update large view
							$(".photo_large_view").attr("src", $("img.rounded-img.active").attr("src"));
							$(".photo_discription").html($("img.rounded-img.active").attr("alt"));
							
							//rounded corner image effect
							$(".rounded-img").load(function() {
								$(this).wrap(function(){
								  return '<span class="' + $(this).attr('class') + '" style="background:url(' + $(this).attr('src') + ') no-repeat center center; width: 100px; height: 75px; background-size: 100%;" />';
								});
								$(this).css("opacity","0");
							});
						}
					});
					$(".side_menu li.no_ajax").removeClass("no_ajax");
					$(this).addClass("no_ajax");
				}
			});
		});
</script>

<style>
/****************************** student gallery **********************************************/
#gallery{ }
	#gallery .content_container .content { height: auto; }
	#gallery .black_bg { display: none; background-color: #000000; position:absolute; top: 0px; left: 0px; width: 100%; opacity: 0.80; filter: alpha(opacity=80); z-index: 1000; }
	#gallery .gallery_overlay { display: none; background-color: #FFFFFF; position: absolute; left: 0px; right: 0px; top: 150px; margin: 0 auto; width: 620px; height: 470px; z-index: 2000; } 
	#gallery .gallery_overlay .close_button { background: url("images/all.png") 0 -42px no-repeat; width: 35px; height: 35px; position: absolute; top: 0; right: 0; cursor: pointer; z-index: 1000; }
	#gallery .gallery_overlay .gallery_photos { margin: 10px 0px 0px 10px; }
	#gallery .gallery_overlay .gallery_photos img { width: 600px; display: none; }
	#gallery #play { float: right; }
	#gallery .inside_body_container { height: 100%; overflow: hidden; padding: 0px 10px 10px 10px; }
	#gallery .inside_body_container #big_display { background-color: #7d7b7b; clear: both; height: 650px; padding-top: 25px; position: relative; }
	#gallery .inside_body_container #big_display #corner { background: url("images/all.png") 0 0 no-repeat; width: 37px; height: 37px; position: absolute; right: 0; top: 0; }
	#gallery .inside_body_container #big_display img { width: 600px; margin: 25px 24px 10px 24px; border: solid 1px #FFFFFF; }
	#gallery .inside_body_container #big_display .photo_container { width: 650px; height: 600px; border: solid 1px #cdcccc; clear: both; background-color: #FFFFFF; margin: 0 auto; box-shadow: 7px 7px 10px #000000; }
	#gallery .inside_body_container #big_display .photo_discription { text-align:left; color: #000000; width: 600px; margin-left: 24px; font-family:"arial", serif; }
	#gallery .inside_body_container #small_display { background-color: #eae9e9; border: solid 1px #cdcccc; padding: 15px 0px 0px 20px; overflow: hidden; }
	#gallery .rounded-img { border: 1px solid #cecdcd; border-radius: 10px 10px 10px 10px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4); display: inline-block; overflow: hidden; margin: 0px 5px 15px 0px; width: 100px; height: 75px; cursor: pointer;  opacity: 0.5; filter: alpha(opacity=50); }
	#gallery .rounded-img:hover { opacity: 0.9; filter: alpha(opacity=90); border-color: #cecece; }
	#gallery .rounded-img.active { opacity: 1.0; filter: alpha(opacity=100); border-color: #FFFFFF; }
	#gallery .slideshow_btn { float: right; margin: 0 23px 10px 0; }
</style>
<?php
	include("google_analytics.tpl.php");
?>
</head>

<body id="gallery">
<div class="black_bg"></div>
<div class="gallery_overlay">
	<div class="gallery_photos">
        <?php
			foreach($vars["images_slides"] as $image_slide){
				echo $image_slide;
			}
		?>
    </div>
	<div class="close_button"></div>
</div>
<?php
	$home_menu_active = "student_gallery";
	include("global_header.tpl.php");
?>
<div class="main_content">
	<?php
		include("side_banner.tpl.php");
		$side_menu = new SideMenu();
		$side_menu->addItem("2011-2012", "c_2011", "c_2011");
		$side_menu->addItem("2010-2011", "c_2010", "c_2010");
		$side_menu->addItem("2009-2010", "c_2009", "c_2009");
		$side_menu->addItem("2008-2009", "c_2008", "c_2008");
		//$side_menu->addItem("2007-2008", "c_2007", "c_2007");
		//$side_menu->addItem("2006-2007", "c_2006", "c_2006");
		$side_menu->addItem("2005-2006", "c_2005", "c_2005");
		$side_menu->setActiveItem("2011-2012");
		echo $side_menu;
	?>	
    <div class="content_container">
   	  <div class="content">
            <div class="inside_body_container">
            	<div id="big_display">
                	<div id="corner"></div>
                    <div class="photo_container">
                    	<img class="photo_large_view" />
                        <p class="photo_discription"></p>
                    </div>
                </div>
                <div id="small_display">
					<?php
						foreach($vars["images"] as $image){
							echo $image;
						}
					?>
                    <br /><div class="orange_btn slideshow_btn"><span>Slideshow</span></div>
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