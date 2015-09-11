$(function(){
	
	var note = $('#note');


	var ts 	= $('#countdown').attr('endtime') * 1000;
	//var ts = (new Date()).getTime() + 10*24*60*60*1000;

	$('#countdown').countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			message += days + " day" + ( days==1 ? '':'s' ) + ", ";
			message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
			message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
			message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";

			note.html(message);
		}
	});
	
});
