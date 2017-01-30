	var initial = 138240; // set the desired days
	var seconds = initial;
	function timer() {
	    var days        = Math.floor(seconds/24/60/60);
	    var hoursLeft   = Math.floor((seconds) - (days*86400));
	    var hours       = Math.floor(hoursLeft/3600);
	    var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
	    var minutes     = Math.floor(minutesLeft/60);
	    
	    var remainingSeconds = seconds % 60;

	    if ( days < 10 ) { days = "0" + days; };
	    if ( hours < 10 ) { hours = "0" + hours; };
	    if ( minutes < 10 ) { minutes = "0" + minutes; };

	    if (remainingSeconds < 10) {
	        remainingSeconds = "0" + remainingSeconds; 
	    }

	    //document.getElementById('countdown').innerHTML = days + ":" + hours + ":" + minutes + ":" + remainingSeconds;
	    document.getElementById('countdown').innerHTML = '<li><span class="head">Days</span><span class="time">'+days+'</span></li>' +
	    	'<li><span class="head">Hours</span><span class="time">'+hours+'</span></li>' +
	    	'<li><span class="head">Mins</span><span class="time">'+minutes+'</span></li>' +
	    	'<li><span class="head">Secs</span><span class="time">'+remainingSeconds+'</span></li>';

	    if (seconds == 0) {
	        clearInterval(countdownTimer);
	        document.getElementById('countdown').innerHTML = '<li><span class="head">Days</span><span class="time">'+days+'</span></li>' +
	    	'<li><span class="head">Hours</span><span class="time">'+hours+'</span></li>' +
	    	'<li><span class="head">Mins</span><span class="time">'+minutes+'</span></li>' +
	    	'<li><span class="head">Secs</span><span class="time">'+remainingSeconds+'</span></li>';
	    } else {
	        seconds--;
	    }
	}
	var countdownTimer = setInterval('timer()', 1000);