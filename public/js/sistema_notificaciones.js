 function notifications() { 
	 var timeInMs = 200;
	 var extraTimePerNotification = 200;
				if (!document.getElementById(".notification-box.error")) {
				setTimeout(function(){
					$('.notification-box.error').css("opacity","1");
				}, timeInMs);
				timeInMs = timeInMs+extraTimePerNotification;
				}
				
				if (!document.getElementById(".notification-box.warning")) {
				setTimeout(function(){
					$('.notification-box.warning').css("opacity","1");
				}, timeInMs);
				timeInMs = timeInMs+extraTimePerNotification;
				}
				
				if (!document.getElementById(".notification-box.advice")) {
				setTimeout(function(){
					$('.notification-box.advice').css("opacity","1");
				}, timeInMs);
				timeInMs = timeInMs+extraTimePerNotification;
				}
				
				if (!document.getElementById(".notification-box.notice")) {
				setTimeout(function(){
					$('.notification-box.notice').css("opacity","1");
				}, timeInMs);
				timeInMs = timeInMs+extraTimePerNotification;
				}
				
				if (!document.getElementById(".notification-box.alert")) {
				setTimeout(function(){
					$('.notification-box.alert').css("opacity","1");
				}, timeInMs);
				timeInMs = timeInMs+extraTimePerNotification;
				}
	  }
	  function closeNotificationBox(boxID){
				$('.notification-box'+boxID+'').css("transition","all 1s");
				$('.notification-box'+boxID+'').css("opacity","1");
				$('.notification-box'+boxID+'').css("opacity","0");
				setTimeout(function(){
				var height = $('.notification-box'+boxID+'').height();
				$('.notification-box'+boxID+'').css("height",""+height+"px");
				$('.notification-box'+boxID+'').css("margin-left","-100px");
				}, 100);
				setTimeout(function(){
				$('.notification-box'+boxID+'').css("height","0px");
				$('.notification-box'+boxID+'').css("padding","0px");
				$('.notification-box'+boxID+'').css("margin","0px");
				}, 1000);
				setTimeout(function(){
				$('.notification-box'+boxID+'').hide();
				}, 2500);
		}