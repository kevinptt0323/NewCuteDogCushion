var fb = {
	login : function(username, password) {
		console.log("fb login as " + username + "/" + password);
	},
	albumInit : function() {
		for(i=1; i<=50; ++i) {
			$("#fb-album").append("<div class=\"photo thumbnail\">" + i + "</div>");
		}
	},
	fadeIn : function(index) {
		fadeIn = this.fadeIn;
		console.log(index);
		if( index==$(".photo.thumbnail").length ) return;
		$(".photo.thumbnail").eq(index).fadeIn(500);
		setTimeout(function(){fadeIn(index+1)}, 10);
	}
};
var nas = {
	login : function(username, password) {
		console.log("nas login as " + username + "/" + password);
	}
};
$(function() {
	fb.albumInit();
	$("#fb-login .submit").on('click', function() {
		fb.login($("#fb-username").val(), $("#fb-password").val());
	});
	$("#nas-login .submit").on('click', function() {
		nas.login($("#nas-username").val(), $("#nas-password").val());
	});
});
