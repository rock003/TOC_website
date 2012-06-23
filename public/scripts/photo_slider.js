/**
	Author: Benny
**/

function photo_slider(photo_list, time_interval, class_name){
	var current = 0;
	var interval="";
	
	set_photos();
	displayImage(0);
	$(".caption").hide();
	
	this.start = startInterval;
	this.end = stopInterval;
	
	//setup the photo slider html
	function set_photos(){
		var name = "."+class_name;
		var content;
		var description;
		var image_name;
		var current_page=0;
		
		for(i in photo_list){
			current_page++;
			description = photo_list[i].replace(/images\/|\.jpg/g, "").replace(/-/g, " ");
			content = "<div id='image"+i+"'><img src='"+photo_list[i]+"' alt='"+description+"' /><div class='caption'><p id='page_number'>"+current_page+"/"+photo_list.length+"</p><p id='description_text'>"+description+"</p></div></div>";
			$(name).append(content);
			image_name = "#image"+i;
			$(image_name).hide();
		}
	}
	
	//display the ith image
	function displayImage(i){
		var name = "#image"+i;
		//alert("display"+name);
		$(name).fadeIn(2000);
	}
	
	//hide the ith image
	function hideImage(i){
		var name = "#image"+i;
		//alert("hide"+name);
		$(name).fadeOut(2000);
	}
	
	//hide current image and display next 1
	function slide(total){
		if(current == total-1){
			hideImage(current);
			current = 0;
			displayImage(current);
		}
		else{
			hideImage(current);
			current++;
			displayImage(current);
		}
	}
	
	function startInterval(){
		interval = setInterval(function() { slide(photo_list.length); }, time_interval);
	}
	
	function stopInterval(){
		if(interval != ""){
			clearInterval(interval);
		}
	}
}