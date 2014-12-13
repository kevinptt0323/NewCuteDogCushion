var fb = {
	login : function(username, password) {
		console.log("login as " + username + "/" + password);
	}
};
$(function() {
	$("#fb-login .submit").on('click', function() {
		fb.login($("#fb-username").val(), $("#fb-password").val());
	});
});
