var fb = {
	data : new Array(),
	isLogin : false,
	login : function(username, password) {
		console.log("fb login as " + username + "/" + password);
		$("#fb-login .form").addClass("loading");
		this.loginSucceed();
	},
	loginSucceed : function() {
		console.log("fb login succeed");
		if( this.getData() ) {
			$("#fb-login").html("Hello " + this.username + "!");
			this.isLogin = true;
			$("#fb-login .form").removeClass("loading");
		}
	},
	albumInit : function() {
		for(i=0; i<this.photos["thumb"].length; ++i) {
			$("#fb-album").append("<div class=\"photo thumbnail\" style=\"background:url('" + this.photos["thumb"][i]+ "')\">" + i + "</div>");
		}
	},
	fadeIn : function(index) {
		fadeIn = this.fadeIn;
		if( index==$(".photo.thumbnail").length ) return;
		$(".photo.thumbnail").eq(index).fadeIn(500);
		setTimeout(function(){fadeIn(index+1)}, 10);
	},
	getData : function() {
		console.log("getPhoto...");
		obj = this;
		$.ajax({
			type: "GET",
			url: "api/facebook/parser.php?result=1",
			dataType: "json",
			success: function(ret) {
				console.log(" success!");
				obj.data = ret;
				obj.albumInit();
			},
			error: function(ret) {
				console.log(" failed!");
			}
		});
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
	$("#fb-login .submit").on('click', function() {
		fb.login($("#fb-username").val(), $("#fb-password").val());
	});
	$("#nas-login .submit").on('click', function() {
		nas.login($("#nas-username").val(), $("#nas-password").val());
	});
});
