<?php
	include("html_doctype.tpl.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Services</title>
<?php
	include("global_head.tpl.php");
?>
<script type="text/javascript">
</script>

<style>
.about_page {}
	.about_page .info_box.overview { width: 300px; float: right; }
	.about_page .info_box.overview #rounded_title { background-color: #21409a; margin-bottom: 5px; }
	.about_page .info_box.overview #rounded_title h3 { background-color: transparent; }
	.about_page .info_box.overview ul, .about_page .info_box.detail ul { margin: 0; padding: 0 5px 0 10px; }
	.about_page .info_box.detail { width: 500px; float: left; }
	.about_page .info_box.detail #rounded_title { background-color: #F4AA69; margin-bottom: 5px; }
	.about_page .info_box.detail #rounded_title h3 { background-color: transparent; margin-bottom: 5px; }
</style>
<?php
	include("google_analytics.tpl.php");
?>
</head>

<body>
<?php
	$home_menu_active = "services";
	include("global_header.tpl.php");
?>
<div class="main_content">
	<?php
		include("side_banner.tpl.php");
		$side_menu = new SideMenu();
		$side_menu->addItem("services");
		$side_menu->setActiveItem("services");
		echo $side_menu;
	?>	
    <div class="content_container">
   	  <div class="content">
            <div class="about_page">
            	<div class="info_box overview rounded_box">
               		<div id="rounded_title"><h3>Our Services</h3></div>
                	<p>TOC education resources is dedicated to coordinating the high quality education resources for individuals and groups.</p>
                    <ul class="pencil_bullet">
                    	<li><span></span><p>Offer courses, programs and workshops</p></li>
                        <li><span></span><p>Provide education consulting service</p></li>
                        <li><span></span><p>Organize cultural events</p></li>
                        <li><span></span><p>Promote publications</p></li>
                    </ul>
                </div>
                <div class="info_box detail rounded_box">
               		<div id="rounded_title"><h3>Language and Culture Program</h3></div>
                    <ul class="blue_pencil_bullet">
                    	<li><span></span><p>We specialize in Chinese language and culture programs</p></li>
                        <li><span></span><p>We deliver classes from one-on-one to group setting</p></li>
                        <li><span></span><p>We hold classes on-site at the location of your choice</p></li>
                        <li><span></span><p>We tailor-make the learning materials for meeting individual needs</p></li>
                        <li><span></span><p>We specialize in a "theme-based" curriculum, in which you can learn concept, vocabulary, language skills related to a particular subject matter</p></li>
                        <li><span></span><p>We offer ongoing reinforcement with an interactive approach</p></li>
                        <li><span></span><p>We incorporate structured learning and creative activities</p></li>
                    </ul>
                </div>
                <div class="info_box detail rounded_box">
               		<div id="rounded_title"><h3>Education Consulting Service</h3></div>
                    <ul class="blue_pencil_bullet">
                    	<li><span></span><p>We help students research the available options and gain admission to high schools/post secondary institutions that will provide the environment in which they will thrive and succeed</p></li>
                        <li><span></span><p>We provide interpretation/translation service to help students and their families connect with the education system in British Columbia</p></li>
                    </ul>
                </div>
                 <div class="info_box detail rounded_box">
               		<div id="rounded_title"><h3>Culture Communication Service</h3></div>
                    <ul class="blue_pencil_bullet">
                    	<li><span></span><p>We offer training solutions to enhance cross-cultural understanding</p></li>
                        <li><span></span><p>We establish media relations to achieve business targets in multi-cultural community</p></li>
                        <li><span></span><p>We coordinate strategic support to provide quality cultural events and conferences</p></li>
                    </ul>
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