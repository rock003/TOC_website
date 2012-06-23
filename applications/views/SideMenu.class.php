<?php

class SideMenu{
	private $items;
	private $active_item;
	
	function __construct(){
	}
	
	function setActiveItem($item){
		$this->active_item = $item;
	}
	
	function addItem($display_name, $class_name="", $id_name="", $link=""){
		if($class_name == ""){
			$class_name = $display_name;
		}
		
		$this->items[] = array("display_name" => $display_name, "class_name" => $class_name, "id_name" => $id_name, "link" => $link);
	}
	
	function __toString(){
		$content = '
			<div class="side_menu">
    			<ul>
		';
		
		foreach($this->items as $item){
			if($this->active_item == $item["display_name"]){
				//if is not a link
				if($item["link"] == ""){
					//if has id_name then add id
					$content .= '<li class="active '.$item["class_name"].'"'.($item["id_name"]==""?'':'id="'.$item["id_name"].'"').'><p>'.ucfirst($item["display_name"]).'</p></li>';	
				} else{
					//if has id_name then add id
					$content .= '<li class="active '.$item["class_name"].'"'.($item["id_name"]==""?'':'id="'.$item["id_name"].'"').'><a href="'.$item["link"].'">'.ucfirst($item["display_name"]).'</a></li>';
				}
			} else {
				if($item["link"] == ""){
					//if has id_name then add id
					$content .= '<li class="'.$item["class_name"].'"'.($item["id_name"]==""?'':'id="'.$item["id_name"].'"').'><p>'.ucfirst($item["display_name"]).'</p></li>';	
				} else{
					//if has id_name then add id
					$content .= '<li class="'.$item["class_name"].'"'.($item["id_name"]==""?'':'id="'.$item["id_name"].'"').'><a href="'.$item["link"].'">'.ucfirst($item["display_name"]).'</a></li>';
				}
			}
		}
		
		$content .= '
				</ul>
   		 	</div>
		';
		
		return $content;
	}
}