<?php
	include("html_doctype.tpl.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Links</title>
<?php
	include("global_head.tpl.php");
?>
<script type="text/javascript">
		$(document).ready(function(){
			
		});
</script>

<style>
.info_box { padding-bottom: 5px; width: 500px; }
.info_box.links #rounded_title { background-color: #F4AA69; }
.info_box.links #rounded_title h3 { background-color: transparent; margin-bottom: 10px; }
.info_box.links p { padding-bottom: 0; }

.info_box.weekly { float: right; width: 300px; }
.info_box.weekly #rounded_title { background-color: #21409a; }
.info_box.weekly #rounded_title h3 { background-color: transparent; margin-bottom: 10px; }

ul { padding-left: 10px; padding-right: 5px; }
.links ul li { margin-bottom: 10px; }
</style>
<?php
	include("google_analytics.tpl.php");
?>
</head>

<body>
<?php
	$home_menu_active = "links";
	include("global_header.tpl.php");
?>
<div class="main_content">
	<?php
		include("side_banner.tpl.php");
		$side_menu = new SideMenu();
		$side_menu->addItem("links");
		$side_menu->setActiveItem("links");
		echo $side_menu;
	?>	
    <div class="content_container">
   	  <div class="content">
      	<div class="info_box weekly rounded_box">
            <div id="rounded_title"><h3>Weekly Features</h3></div>
                <ul class="pencil_bullet">
					<li><span></span><p><a href="http://www.5qchannel.com/indexe2011.asp" target="_blank">Chinese idioms in animation</a></p><img src="images/link_chinese_idiom.jpg" style="border: 3px solid #fff; margin-top: 5px;"/></li>
                    <li><span></span><p><a href="http://www.chinapage.org/main2.html" target="_blank">China the Beautiful</a></p></li>
                    <li><span></span><p><a href="http://edu.ocac.gov.tw/" target="_blank">All about Chinese</a></p></li>
                </ul>
        </div>
		<div class="info_box links rounded_box">
			<div id="rounded_title"><h3>Favorite Sites</h3></div>
			<ul class="blue_pencil_bullet">
				<li><span></span><p><a href="http://www.csulb.edu/~txie/online.htm" target="_blank">Learn Chinese online</a></p></li>
				<!-- <li><span></span><p><a href="http://astore.amazon.ca/toceducationr-20" target="_blank">Go to our TOC e-store...a link to help you find the up-to-date resources about Chinese</a></p></li> -->
				<li><span></span><p><a href="http://chineseculture.about.com/library/extra/idiom/blidiom.htm" target="_blank">Chinese Idioms</a>, This an interesting link to know more about the Chinese idioms...grasp the story, find out the hidden meaning and learn the expression.</p></li>
				<li><span></span><p><a href="http://zhongwen.com/" target="_blank">Zhong Wen</a>, Zhongwen.com contains the complete text of Amazon's <a href="http://www.amazon.com/exec/obidos/ASIN/0966075005/zipubooks" target="_blank">Chinese Characters: A Genealogy and Dictionary</a></p></li>
				<li><span></span><p><a href="http://www.mandarintools.com/" target="_blank">Mandairn Tools</a>, The site provides tools to assist people in learning and using the beautiful Chinese language. From the novice Chinese language student to the advanced programmer, there is something here for everyone.</p></li>
				<li><span></span><p><a href="http://dir.yahoo.com/Arts/Humanities/Philosophy/Chinese_Philosophy/" target="_blank">Chinese Philosophy</a>, Yahoo! reviewed these sites and found them related to Chinese Philosophy.</p></li>
				<li><span></span><p><a href="http://www.yellowbridge.com/language/twisters.html" target="_blank">Mandarin Twisters</a>, As in all languages, tongue twisters are a fun tool for improving one's enunciation.</p></li>
				<li><span></span><p><a href="http://www.cantonese.ca/index.html?PHPSESSID=024f58ca8f2f3268fea044e4c28b506b" target="_blank">Learn Cantonese</a>, A site offers information for learning colloquial Cantonese (Yue Chinese) as it is spoken by today's youth in Hong Kong and in overseas communities such as Canada, the United States and Australia.</p></li>
			</ul>
		</div>
	  </div>
    </div>
</div>
<?php
	include("global_footer.tpl.php");
?>
</body>
</html>