<?php
	include("html_doctype.tpl.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student management</title>
<?php
	include("global_head.tpl.php");
?>
<script src="scripts/jquery.maskedinput-1.3.min.js" type="text/javascript"></script>

<script type="text/javascript">
		function hideMsg(){
			$(".msg_box").fadeOut();
		}

		$(document).ready(function(){
			$("input[name='phoneNumber']").mask("(999) 999-9999");
			$("input[name='fatherPhone']").mask("(999) 999-9999");
			$("input[name='motherPhone']").mask("(999) 999-9999");
								   
			//get and put selected user info into corresponding fields					   
			$(".user_table").delegate("span", "click", function(){			
				$.ajax({
					type: "POST",
					url: "ajax_student_info",
					data: "u_id="+$(this).attr("value"),
					dataType: "JSON",
					success: function(data){
						$("input[name=firstName]").val(data[0]["firstName"]);
						$("input[name=lastName]").val(data[0]["lastName"]);
						$("input[name=chineseName]").val(data[0]["chineseName"]);
						$("input[name=phoneNumber]").val(data[0]["phoneNumber"]);
						$("input[name=address]").val(data[0]["address"]);
						$("textarea[name=allergy]").val(data[0]["allergy"]);
						$("textarea[name=remark]").val(data[0]["remark"]);
						$("input[name=fatherName]").val(data[0]["fatherName"]);
						$("input[name=fatherPhone]").val(data[0]["fatherPhone"]);
						$("input[name=fatherEmail]").val(data[0]["fatherEmail"]);
						$("input[name=motherName]").val(data[0]["motherName"]);
						$("input[name=motherPhone]").val(data[0]["motherPhone"]);
						$("input[name=motherEmail]").val(data[0]["motherEmail"]);
						$("input[name=u_id]").val(data[0]["u_id"]);

						$(".class_info .detail #level").remove();
						if(data[1] != null){
							$.each(data[1], function(index, value){
								$(".class_info .detail[value='"+value["year"]+"']").append('<span id="level" value="'+value["c_id"]+'">'+value["name"]+'</span>');
							});
						}
					}
				});
			});
			
			//submit and save user info when the form is submitted
			$("#user_form").submit(function(event){
				event.preventDefault();
				$("input[type=submit]").attr("disabled", "disabled");
				
				//get all field values into a string to pass to data
				var str = "";
				$("#input_field", this).each(function(){
					if($(this).children("textarea").length > 0){
						str = str + $('textarea', this).attr("name") + "=" + $('textarea', this).val() + "&";
					} else{
						str = str + $('input[type="text"]', this).attr("name") + "=" + $('input[type="text"]', this).val() + "&";
					}
				});
				str = str.substring(0, str.length - 1);		//remove the last '&'

				$(".msg_box span").empty().html('<img src="/toc/images/ajax-loader.gif" />');
				$(".msg_box").fadeIn();
				$.ajax({
					type: "POST",
					url: "ajax_student_update",
					data: "u_id="+$("input[name=u_id]").val()+"&"+str,
					dataType: "JSON",
					success: function(data){
						if(data == "success"){
							$(".msg_box span").empty().html("Saved Complete!");
							setTimeout("hideMsg()", 2000);
							$("input[type=submit]").removeAttr("disabled");
						}
					}
				});
				
				return false;
			});
			
			//update the table based on filter
			$("#filter_btn").click(function(){
				$.ajax({
					type: "POST",
					url: "ajax_filter_class",
					data: "class="+$("#filter_level").val()+"&year="+$("#filter_year").val(),
					dataType: "JSON",
					success: function(data){
						$(".user_table span").remove();
						$.each(data, function(index, value){
							$(".user_table").append(value);
						});
					}
				});
			});
			
			//remove the class
			$(".detail").delegate("#level", "click", function(){
				//alert($(this).attr("value"));
				var response = confirm("Are you sure you want to delete?");
				if(response){
					$.ajax({
						type: "POST",
						url: "ajax_delete_class",
						data: "c_id="+$(this).attr("value")+"&u_id="+$("input[name=u_id]").val()+"&year="+$(this).parent().attr("value"),
						dataType: "JSON",
						success: function(data){
							$(".class_info .detail #level").remove();
							if(data != null){
								$.each(data, function(index, value){
									$(".class_info .detail[value='"+value["year"]+"']").append('<span id="level" value="'+value["c_id"]+'">'+value["name"]+'</span>');
								});
							}
						}
					});
				}
			});
			
			//add a class
			$(".add_class_btn").click(function(){
				//alert($(this).parent().find("select").val());
				if($("input[name=u_id]").val().length > 0 && $(this).parent().find("select").val() != 0){
					$.ajax({
						type: "POST",
						url: "ajax_add_class",
						data: "c_id="+$(this).parent().find("select").val()+"&u_id="+$("input[name=u_id]").val()+"&year="+$(this).parent().parent().attr("value"),
						dataType: "JSON",
						success: function(data){
							if(data["status"] == "success"){
								$(".class_info .detail #level").remove();
								$.each(data["list"], function(index, value){		//just added a class, cannot be null
									$(".class_info .detail[value='"+value["year"]+"']").append('<span id="level" value="'+value["c_id"]+'">'+value["name"]+'</span>');
								});
							} else{
								alert("Cannot add a duplicate class.");
							}
						}
					});
				} else {
					alert("Please select a user first, and select a class from the drop down list.");
				}
			});
		});
</script>

<style>
.msg_box { border: 5px solid #fff; background-color: #CCC; display: none; width: 300px; height: 100px; z-index: 1000; position: absolute; top: 35%; left: 40%; opacity: 0.85; filter: alpha(opacity=85); box-shadow: 0 0 8px rgba(0, 0, 0, 0.3); }
.msg_box span { display: block; margin: 30px auto; width: 150px; font-weight: bold; font-size: 18px; }

.user_tab .user_table { float: right; border: 2px solid #9A9A9B; padding: 5px; width: 230px; height: 638px; overflow: auto; background-color: #F9F8F2; margin-top: 8px; }
.user_tab .user_table .filters { margin-bottom: 5px; }
.user_tab .user_table span { display: block; margin: 3px 0; cursor: pointer; padding-left: 5px; }
.user_tab .user_table span:hover { background-color: #999; color: #FFF; }

.user_table #filter_year { width: 138px; margin-top: 5px; } 

#user_form { width: 550px; }
#user_form fieldset { border: 2px solid #9A9A9B; margin-bottom: 10px; }
#user_form input[name=address], #user_form input[name=fatherEmail], #user_form input[name=motherEmail] { width: 397px; }
#user_form .class_info { border: 1px solid #aaa; width: 510px; margin-bottom: 10px; }
#user_form .class_info p { background-color: #4264C7; color: #FFF; padding: 3px 0 3px 5px; }
#user_form .class_info .detail { padding-left: 5px; background-color: #F9F8F2; overflow: hidden; border-bottom: 3px solid #CCC; }
#user_form .class_info .detail:last-child { border-bottom: none; }
#user_form .class_info .detail #year { padding: 3px 18px 3px 3px; margin: 3px 0; display: block; float: left; clear: both; } 
#user_form .class_info .detail #class_select { margin-top: 3px; }
#user_form .class_info .detail #level { cursor: pointer; padding: 3px 18px 3px 3px; margin: 3px 0; display: block; float: left; clear: both; }
#user_form .class_info .detail #level:hover { background-color: #000; color: #fff; background-image:url("/toc/images/test_black_btn.png"); background-repeat:no-repeat; background-position:right top; }

#input_field { display: inline-block; margin: 0 10px 10px 0; }
#input_field label { float: left; margin-right: 10px; min-width: 95px; }
#input_field input[type=text] { margin: 0; padding: 2px; }
#input_field textarea { width: 400px; }
</style>
</head>

<body>
<div class="msg_box"><span><img src="/toc/images/ajax-loader.gif" /></span></div>
<?php
	include("global_header.tpl.php");
?>
<div class="main_content">
	<?php
		$side_menu = new SideMenu();
		$side_menu->addItem("user");
		$side_menu->addItem("role");
		$side_menu->addItem("feature");
		$side_menu->setActiveItem("user");
		echo $side_menu;
	?>	
    <div class="content_container">
   	  <div class="content">
      	<div class="user_tab">
        	<div class="user_table">
            	<div id="filters">
                	<select id="filter_level">
                    	<option value="all">All</option>
                    	<?php
							foreach($vars["classes"] as $class){
								echo '<option value="'.$class["name"].'">'.$class["name"].'</option>';
							}
						?>
                    </select>
                    <select id="filter_year">
						<option value="2012" selected="selected">2012 - 2013</option>
                    	<option value="2011">2011 - 2012</option>
                        <option value="2010">2010 - 2011</option>
                    </select>
                    <button type="button" id="filter_btn">Refresh</button> 
                </div>
            	<?php
					foreach($vars["users"] as $user){
						echo '<span value="'.$user["u_id"].'">'.$user["firstName"].' '.$user["lastName"].'</span>';
					}
				?>
            </div>
            <form id="user_form">
            	<fieldset>
                	<legend>Name</legend>
                	<div id="input_field">
                    	<label>First Name</label><input type="text" name="firstName" />
                    </div>
                    <div id="input_field">
                    	<label>Last Name</label><input type="text" name="lastName" /> 
                    </div>
                    <div id="input_field">
                   		<label>Chinese Name</label><input type="text" name="chineseName" />
                    </div>
                </fieldset>
                <fieldset>
                	<legend>Information</legend>
                    <div class="class_info">
                    	<p>Class History</p>
						<div class="detail" value="2012">
                            <span id="year">2012 - 2013</span>
                            <div id="class_select">
                                <select>
                                    <option value="0">-- Select --</option>
                                    <?php
                                        foreach($vars["classes"] as $class){
                                            echo '<option value="'.$class["c_id"].'">'.$class["name"].'</option>';
                                        }
                                    ?>
                                </select>
                                <button type="button" class="add_class_btn">Add</button> 
                            </div>
                        </div>
                    	<div class="detail" value="2011">
                            <span id="year">2011 - 2012</span>
                            <div id="class_select">
                                <select>
                                    <option value="0">-- Select --</option>
                                    <?php
                                        foreach($vars["classes"] as $class){
                                            echo '<option value="'.$class["c_id"].'">'.$class["name"].'</option>';
                                        }
                                    ?>
                                </select>
                                <button type="button" class="add_class_btn">Add</button> 
                            </div>
                        </div>
                        <div class="detail" value="2010">
                            <span id="year">2010 - 2011</span>
                            <div id="class_select">
                                <select>
                                    <option value="0">-- Select --</option>
                                    <?php
                                        foreach($vars["classes"] as $class){
                                            echo '<option value="'.$class["c_id"].'">'.$class["name"].'</option>';
                                        }
                                    ?>
                                </select>
                                <button type="button" class="add_class_btn">Add</button> 
                            </div>
                        </div>
                    </div>
                    <div id="input_field">
                    	<label>Allergy</label><textarea rows="3" name="allergy"></textarea>
                    </div>
                    <div id="input_field">
               			<label>Remark</label><textarea rows="3" name="remark"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                	<legend>Contacts</legend>
                    <div id="input_field">
                		<label>Phone Number</label><input type="text" name="phoneNumber" />
                    </div>
                    <br />
                    <div id="input_field">
                		<label>Address</label><input type="text" name="address" />
                    </div>
                    <br/>
                	<div id="input_field">
                		<label>Father</label><input type="text" name="fatherName" />
                    </div>
                    <div id="input_field">
                    	<label>Phone</label><input type="text" name="fatherPhone" />
                    </div>
                    <div id="input_field">
                    	<label>Email</label><input type="text" name="fatherEmail" />
                    </div>
                    <br />
                    <div id="input_field">
                   		<label>Mother</label><input type="text" name="motherName" />
                    </div>
                    <div id="input_field">
                    	<label>Phone</label><input type="text" name="motherPhone" />
                    </div>
                    <div id="input_field">
                    	<label>Email</label><input type="text" name="motherEmail" />
                   	</div>
                </fieldset>
                <input type="hidden" value="" name="u_id"/>
                <input type="submit" value="Save" name="save_user" />
            </form>
        </div>
        <div class="role_tab">
        	<?php
				foreach($vars["roles"] as $role){
					echo $role["name"]."<br />";
				}
			?>
        </div>
        <div class="feature_tab">
        	<?php
				foreach($vars["features"] as $feature){
					echo $feature["name"]."<br />";
				}
			?>
        </div>
      </div>
    </div>
</div>
<?php
	include("global_footer.tpl.php");
?>
</body>
</html>