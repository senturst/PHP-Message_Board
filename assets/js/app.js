
$(function() { 
	$("#submit").click(function() { 
		var title = $("#title").val();
		var message = $("#message").val();
		if(title == ""||message == ""){
				alert('请填写标题与内容');
				return false;
		}
        
		var Str = 'title='+ title + '&message=' + message; 
		$.ajax({ 
			type: "POST", 
			url: "post.php", 
			data: Str, 
			success: function() { 
				$("#panel-box").append("<div class='am-panel am-panel-default'><div class='am-panel-hd'><h3 class='am-panel-title'>"+title+"</h3></div><div class='am-panel-bd'>"+message+"</div></div>");
				alert('评论成功');
				var date = new Date();
				date.setTime(date.getTime() + (1 * 60 * 1000));
				$.cookie('content','1',{ expires: date });
			}
		}); 
		return false; 
	}); 
}); 