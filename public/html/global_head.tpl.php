<meta name="description" content="TOC education resources is dedicated to coordinating the high quality education resources for individuals and groups." />
<meta name="keywords" content="Chinese, Cantonese, Mandarin, education, TOC, resources, children, group, school, class, activities" />
<meta name="robots" content="INDEX,NOFOLLOW" />
<meta name="author" content="Benny Chen" />
<meta property="og:title" content="TOC Education Resources"/>
<meta property="og:image" content="http://badge.facebook.com/badge/232077693492188.2727.662113337.png"/>
<meta property="og:site_name" content="TOC Education Resources"/>
<meta property="og:description" content="TOC Chinese Program is a dynamic and practical approach to learning Cantonese/Mandarin with up-to-date 'theme-based' curriculum."/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="http://www.toceducationresources.com/"/>
<meta property="fb:admins" content="503485985"/>
<link rel="shortcut icon" href="images/logo_favicon.ico" type="image/x-icon" >
<link rel="stylesheet" type="text/css" href="css/global_style.css" />
<!--[if lt IE 9]>
	<link rel="stylesheet" type="text/css" href="css/ie8_and_lower.css" />
<![endif]-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="scripts/photo_slider.js"></script> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script>
<script type="text/javascript" src="scripts/global.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="scripts/jquery.lazyload.min.js"></script>  
<script type="text/javascript">
	$(document).ready(function(){
		$(".side_menu li").click(function (){
			//click on same tab, do nothing
			if($(this).hasClass("active")){
				return;
			} else{
				var old_class = $(".side_menu li.active").attr("class");
				old_class = old_class.replace("active", "");
				old_class = old_class.replace(" ", "");
				
				var new_class = $(this).attr("class");
				
				$('.' + old_class + '_tab').hide();
				$('.' + new_class + '_tab').show();
				
				$(".side_menu li").removeClass("active");
				$(this).addClass("active");
			}							   
		});
		
		$(".side_menu li").each(function(){
			if(!$(this).hasClass("active")){
				$('.' + $(this).attr("class") + '_tab').hide();
			}
		});
	});
</script>
