<div class="footer">
	<div class="footer_link">
    	<ul>
        	<?php
            if(isset($_SESSION["uid"])){
			?>
				<li><a href="/logout">Logout</a></li>
            <?php
            } else{
			?>
				<li><a href="/about">About</a></li>
            	<li><a href="/contact">Career</a></li>
            	<li><a href="/contact">Contact</a></li>
           		<li><a href="http://astore.amazon.ca/toceducationr-20" target="_blank">TOC e-store</a></li>
            <?php
            }
			?>
        </ul>
        <span id="copyright">Copyright &#169; 2012 TOC Education Resources</span>
    </div>
</div>