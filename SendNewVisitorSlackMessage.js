//Send a generic message to Slack
(function() {
	$.ajax({
    url: 'SendNewVisitorSlackMessage.php',
    type: "GET",
	})
})();

//Send IP and location to Slack - only works without Ad blockers
//Use IPify to get the IP address
(function() {$.ajax({
	type: "GET",
	url: "https://api.ipify.org/",
	success: function(iphtml) {
		$.ajax({
		url: 'SendNewVisitorSlackMessage.php',
		type: "POST",
		data: {
			ip: iphtml
		}})},
	error: function (error) {
		console.log(error);
	}});
})();