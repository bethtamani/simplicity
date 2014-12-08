window.onload = function() {
    
    // set radio event listeners for task form
    var frequencyRadios = document.getElementsByClassName("frequencyRadio");
    for(var i = 0, max = frequencyRadios.length; i < max; i++) {
    	frequencyRadios[i].onclick = function() {
            frequencyRadio(this.value);
    	}
    }
    
    //set event listeners for task views
    var allTasks = document.getElementById("allTasks");
    allTasks.onclick = function () {
    	document.getElementById("unscheduled").style.display = "block";
    	document.getElementById("tasksDaily").style.display = "block";
    	document.getElementById("tasksWeekly").style.display = "inline-block";
    	document.getElementById("tasksMonthly").style.display = "block";
    	document.getElementById("tasksMonthly").style.float = "right";
    }
    
    var dailyTasks = document.getElementById("dailyTasks");
    dailyTasks.onclick = function () {
    	document.getElementById("unscheduled").style.display = "none";
    	document.getElementById("tasksDaily").style.display = "block";
    	document.getElementById("tasksWeekly").style.display = "none";
    	document.getElementById("tasksMonthly").style.display = "none";
    }
    
    var weeklyTasks = document.getElementById("weeklyTasks");
    weeklyTasks.onclick = function () {
    	document.getElementById("unscheduled").style.display = "none";
    	document.getElementById("tasksDaily").style.display = "none";
    	document.getElementById("tasksWeekly").style.display = "inline-block";
    	document.getElementById("tasksMonthly").style.display = "none";
    }
    
    var monthlyTasks = document.getElementById("monthlyTasks");
    monthlyTasks.onclick = function () {
    	document.getElementById("unscheduled").style.display = "none";
    	document.getElementById("tasksDaily").style.display = "none";
    	document.getElementById("tasksWeekly").style.display = "none";
    	document.getElementById("tasksMonthly").style.display = "block";
    	document.getElementById("tasksMonthly").style.float = "left";
    }
    
    var unscheduledTasks = document.getElementById("unscheduledTasks");
    unscheduledTasks.onclick = function () {
    	document.getElementById("unscheduled").style.display = "block";
    	document.getElementById("tasksDaily").style.display = "none";
    	document.getElementById("tasksWeekly").style.display = "none";
    	document.getElementById("tasksMonthly").style.display = "none";
    }
    
    
    
    // set event listeners for calendar form
    var recurringBox = document.getElementById("CalendarRecurring");
    recurringBox.onclick = function() {
    	calendarRecurring();
    }
    
    var calendarTypeRadios = document.getElementsByClassName("calendarTypeRadio");
    for(var i = 0, max = calendarTypeRadios.length; i < max; i++) {
    	calendarTypeRadios[i].onclick = function() {
    	    calendarTypeRadio(this.value);
    	}
    }
    
   
    
}



function calendarRecurring(recurring) {
    
    	document.getElementById("recurringDiv").style.display = "block";
    
} 

function calendarTypeRadio(selected) {
    if (selected == 1) {
    	document.getElementById("CalendarDay").disabled = false;
    	document.getElementById("CalendarMonthNumber").disabled = true;
    	document.getElementById("CalendarMonthWeekly").disabled = true;
    	document.getElementById("CalendarMonthDay").disabled = true;
    }
    if (selected == 2) {
    	document.getElementById("CalendarDay").disabled = true;
    	document.getElementById("CalendarMonthNumber").disabled = false;
    	document.getElementById("CalendarMonthWeekly").disabled = true;
    	document.getElementById("CalendarMonthDay").disabled = true;
    }
    if (selected == 3) {
    	document.getElementById("CalendarDay").disabled = true;
    	document.getElementById("CalendarMonthNumber").disabled = true;
    	document.getElementById("CalendarMonthWeekly").disabled = false;
    	document.getElementById("CalendarMonthDay").disabled = false;
    }
}

function frequencyRadio(selected) {
    if (selected == 0) {
    	
    	document.getElementById("weeklyRadio").style.display = "none";
    	document.getElementById("monthlyRadio").style.display = "none";
    
    	
    }
    if (selected == 1) {
    	
    	document.getElementById("weeklyRadio").style.display = "none";
    	document.getElementById("monthlyRadio").style.display = "none";
    }
    if (selected == 2) {
    	
	document.getElementById("weeklyRadio").style.display = "block";
	document.getElementById("monthlyRadio").style.display = "none";
    }
    if (selected == 3) {
    	//document.getElementById("TaskDay9").checked = "checked";
    	document.getElementById("weeklyRadio").style.display = "none";
    	document.getElementById("monthlyRadio").style.display = "block";
    }
}


