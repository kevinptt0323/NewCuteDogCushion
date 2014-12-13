var fb = {
	login : function(username, password) {
		console.log("fb login as " + username + "/" + password);
	}
};
var nas = {
	login : function(username, password) {
		console.log("nas login as " + username + "/" + password);
	}
};
$(function() {
	$("#fb-login .submit").on('click', function() {
		fb.login($("#fb-username").val(), $("#fb-password").val());
	});
	$("#nas-login .submit").on('click', function() {
		nas.login($("#nas-username").val(), $("#nas-password").val());
	});
});
