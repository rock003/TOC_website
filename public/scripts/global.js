/**
Author: Benny
Date: 2011-04-29
**/

function getFormatDate(){
		var now = new Date();
		return findDay(now.getDay()) + " " + findMonth(now.getMonth()) + " " + now.getDate() + ", " + now.getFullYear();
	}
	
	function findDay(value){
		if(value == 0){
			return "Sunday";
		}
		else if(value == 1){
			return "Monday";
		}
		else if(value == 2){
			return "Tuesday";
		}
		else if(value == 3){
			return "Wednesday";
		}
		else if(value == 4){
			return "Thursday";
		}
		else if(value == 5){
			return "Friday";
		}
		else if(value == 6){
			return "Saturday";
		}
	}
	
	function findMonth(value){
		if(value == 0){
			return "January";
		}
		else if(value == 1){
			return "February";
		}
		else if(value == 2){
			return "March";
		}
		else if(value == 3){
			return "April";
		}
		else if(value == 4){
			return "May";
		}
		else if(value == 5){
			return "June";
		}
		else if(value == 6){
			return "July";
		}
		else if(value == 7){
			return "August";
		}
		else if(value == 8){
			return "September";
		}
		else if(value == 9){
			return "October";
		}
		else if(value == 10){
			return "November";
		}
		else if(value == 11){
			return "December";
		}
	}
