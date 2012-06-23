<?php
	include("html_doctype.tpl.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Chinese</title>
<?php
	include("global_head.tpl.php");
?>

<style>
.info_box { padding-bottom: 5px; }
.info_box.general { float: left; width: 500px; }
.info_box.general p { letter-spacing: 1px; text-indent: 20px;}
.info_box.general #rounded_title { background-color: #F4AA69; }
.info_box.general #rounded_title h3 { background-color: transparent; margin-bottom: 10px; }

.info_box.info { float: right; width: 300px; }
.info_box.info #rounded_title { background-color: #21409a; }
.info_box.info #rounded_title h3 { background-color: transparent; margin-bottom: 10px; }

.info_box p#title { padding-bottom: 0; background-color: #F2F2F2; margin-bottom: 5px; }
</style>
<?php
	include("google_analytics.tpl.php");
?>
</head>

<body>
<?php
	$home_menu_active = "chinese";
	include("global_header.tpl.php");
?>
<div class="main_content">
	<?php
		include("side_banner.tpl.php");
		$side_menu = new SideMenu();
		$side_menu->addItem("中文");
		$side_menu->setActiveItem("中文");
		echo $side_menu;
	?>	
    <div class="content_container">
   	  <div class="content">
		<div class="info_box info rounded_box">
			<div id="rounded_title"><h3>課程</h3></div>
			<p id="title">周六廣東話</p>
			<p>10 am - 12 noon<br />班級: Basics, Level 1-4</p>
			<p id="title">周六普通話</p>
			<p>10 am - 12 noon<br />班級: Basics, Level 1-6</p>
			<p>12:45 pm - 2:45 pm<br />班級: Basics, Level 1</p>
			<p id="title">地址</p>
			<p>Stratford Hall School, 3000 Commercial Drive, Vancouver.</p>
			<img src="images/Class.jpg" width="280px" height="210px" style="margin: 0 0 10px 10px;"/>
		</div>
		<div class="info_box general rounded_box">
			<div id="rounded_title"><h3>簡介</h3></div>
			<img src="images/slogan_chinese.png" style="margin-left: 10px; margin-bottom: 10px;"/>
			<p>拓思教育資源中心成立於二零零二年，以發展教育資源，融會多元文化，開創豐盛生活為宗旨。中心的服務包括策劃課程，推廣書刊，籌辦文化活動，以及探討教育時事課題。</p>
			<p>拓思教育資源中心的中文及文化課程， 分有普通話和廣東話兩組，學員多來自海外出生的華裔家庭和非華裔人士。周六課程的學生年齡由五歲兒童至十來歲青少年，班級由基礎班到小學程度；此外，中心亦提供私人課程，為配合不同的學習目標和針對個別需要而設。</p>
			<p>拓思課程使用主題教學，自製教材，小班授課。每學年教授大約二十個主題，按照生活的情況，鞏固學習的進展，並且定期更新主題，務求提供有趣而有效的學習環境。有興趣人士可向課程總監黃紫雁查詢 (604-603-3008) 。</p>
		</div>
	  </div>
    </div>
</div>
<?php
	include("global_footer.tpl.php");
?>
</body>
</html>