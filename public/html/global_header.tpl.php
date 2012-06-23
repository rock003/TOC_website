<!-- For all pages - facebook script for like button -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- For all pages - header -->
<div class="top">
    <div class="head"></div>
</div>    
   
<!-- For all pages - header menu -->
<div class="header_menu">
	<ul>
    	<?php
		if(isset($_SESSION["uid"])){
		} else{
		?>
			<li><a class="home <?php echo ($home_menu_active == "home" ? 'active' : ''); ?>" href="/home">Home</a></li>
			<li><a class="services <?php echo ($home_menu_active == "services" ? 'active' : ''); ?>" href="/services">Services</a></li>
			<li><a class="program <?php echo ($home_menu_active == "program" ? 'active' : ''); ?>" href="/program">Program</a></li>
			<li><a class="student_gallery <?php echo ($home_menu_active == "student_gallery" ? 'active' : ''); ?>"href="/student_gallery">Gallery</a></li>
			<li><a class="links <?php echo ($home_menu_active == "links" ? 'active' : ''); ?>" href="/links">Links</a></li>
			<li><a class="contact <?php echo ($home_menu_active == "contact" ? 'active' : ''); ?>" href="/contact">Contact</a></li>
			<li><a class="chinese <?php echo ($home_menu_active == "chinese" ? 'active' : ''); ?>" href="/chinese">中文</a></li>
        <?php
		}
		?>
	</ul>
</div>