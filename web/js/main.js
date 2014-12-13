var fb = {
	login : function(username, password) {
		console.log("fb login as " + username + "/" + password);
		this.loginSucceed();
	},
	loginSucceed : function() {
		console.log("fb login succeed");
		$("#fb-login").html("Hello Kevin!");
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
		$.ajax({
			url: "api/nas/login.php",
			type: "POST",
			data: {"username": username, "password": password},
			success: function(ret) {
				console.log("success: " + ret);
			},
			error: function(ret) {
				console.log("success: " + ret);
			}
		});
	},
	loginSucceed : function() {
		console.log("fb login succeed");
		$("#fb-login").html("Hello Kevin!");
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
