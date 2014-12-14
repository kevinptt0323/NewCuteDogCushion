var fb = {
	data : new Array(),
	isLogin : false,
	login : function(username, password) {
		console.log("fb login as " + username + "/" + password);
		$("#fb-login .form").addClass("loading");
		var obj = this;
		this.getData(username, function() {
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
	isLogin : false,
	username : "",
	login : function(username, password) {
		console.log("nas login as " + username + "/" + password);
		$("#nas-login .form").addClass("loading");
		var obj = this;
		this.getData(username, password, function() {
			if( obj.username != "" )
				obj.loginSucceed();
			$("#nas-login .form").removeClass("loading");
		});
	},
	loginSucceed : function() {
		console.log("nas login succeed");
		this.isLogin = true;
		$("#nas-login").html("Hello " + this.username + "!");
	},
	getData : function(username, password, callback) {
		var obj = this;
		$.ajax({
			url: "api/nas/login.php",
			type: "POST",
			data: {"username": username, "password": password},
			success: function(ret) {
				console.log("success: " + ret);
				if( ret == "success" )
					obj.username = username;
			},
			error: function(ret) {
				console.log("error: " + ret);
			},
			complete: function(ret) {
				callback();
			}
		});
	},
	upload : function() {
		var photos = this.data["photos"];
		for(var i=0; i<photos.length; ++i) {
			$.ajax({
				url: "api/nas/upload.php?url="+photos[i]["raw"],
				type: "GET",
				success: function(ret) {
				},
				error: function(ret) {
				}
			});
		}
	}
};
$(function() {
	$("#fb-login .submit").on('click', function() {
		fb.login($("#fb-username").val(), $("#fb-password").val());
	});
	$("#nas-login .submit").on('click', function() {
		nas.login($("#nas-username").val(), $("#nas-password").val());
	});
	$(".backup.button")
		.popup({transition: "fade up"})
		.on('click', function() {
			nas.upload();
		});
	$(".sidebar").sidebar('setting', {'transition':'overlay'});
	$(".sidebar-btn").on('click', function() {
		$(".sidebar").sidebar('toggle');
	});
});
