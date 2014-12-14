var fb = {
	data : new Array(),
	isLogin : false,
	login : function(username, password) {
		console.log("fb login as " + username + "/" + password);
		$("#fb-login .form").addClass("loading");
		var obj = this;
		this.getData($("#fb-username").val(), function() {
			console.log("call me");
			if( typeof(obj.data["profile"]) != "undefined" )
				obj.loginSucceed();
			$("#fb-login .form").removeClass("loading");
		});
	},
	loginSucceed : function() {
		console.log("fb login succeed");
		this.isLogin = true;
		$("#fb-login").html("Hello " + this.data["profile"]["name"] + "!");
		this.albumInit();
	},
	albumInit : function() {
		var photos = this.data["photos"];
		for(i=0; i<photos.length; ++i) {
			$("#fb-album").append("<div class=\"photo thumbnail\" style=\"background-image:url('" + photos[i]["thumb"]+ "')\"></div>");
		}
	},
	fadeIn : function(index) {
		fadeIn = this.fadeIn;
		if( index==$(".photo.thumbnail").length ) return;
		$(".photo.thumbnail").eq(index).fadeIn(500);
		setTimeout(function(){fadeIn(index+1)}, 10);
	},
	getData : function(token, callback) {
		console.log("getData...");
		obj = this;
		$.ajax({
			type: "GET",
			url: "api/facebook/parser.php?token="+token,
			dataType: "json",
			success: function(ret) {
				console.log(" success!");
				obj.data = ret;
			},
			error: function(ret) {
				console.log(" failed!");
			},
			complete: function(ret) {
				callback();
			}
		});
		return true;
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
