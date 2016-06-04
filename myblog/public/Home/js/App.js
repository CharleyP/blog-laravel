$(function(){
	//禁止鼠标右键功能
	function stop(){ 
		return false; 
	} 
	document.oncontextmenu=stop;
	//获取点击坐标,并判断是否显示或者隐藏菜单栏目
	var clickX = 0,clickY = 0;
	$(document).mousedown(function(event) {
		if (event.which == 3) {
			clickX = event.pageX;
			clickY = event.pageY;
			$("#IndexMenu").show().css({
				top: clickY,
				left: clickX,
			});
		};
		if (event.which == 1) {
			clickX = event.pageX;
			clickY = event.pageY;
			var MenuY = $("#IndexMenu").offset().top;
			var MenuX = $("#IndexMenu").offset().left;
			var MenuW = $("#IndexMenu").width();
			var MenuH = $("#IndexMenu").height();
			if (clickX <= MenuX || clickY <= MenuY || clickX >= MenuX+MenuW || clickY >= MenuY+MenuH) {
				$("#IndexMenu").hide();
			};	
		};
	})
	//音乐播放器显示隐藏
	var musicIOflag = 0;
	$(".music .musicIO").click(function(event) {
		/* Act on the event */
		if (musicIOflag == 1) {
			$(".music").animate({left:"-460px"}, 500,function(){
				$(".music .musicIO").css({
					"background-position": '-46px -10px',
				});
			});
			musicIOflag = 0;
		}else{
			$(".music").animate({left:"0px"}, 500,function(){
				$(".music .musicIO").css({
					"background-position": '-3px -10px',
				});
			});
			musicIOflag = 1;
		}
	});
	//鼠标右键功能
	$(".menu ul li.reload").click(function(event) {
		/* Act on the event */
		window.location.reload();
	});
	//右键选择换肤打开
	$(".menu ul li.changeBg").click(function(event) {
		/* Act on the event */
		$(".bgList").show();
		$(".menu").hide();
	});
	$(document).mousedown(function(event) {
		/* Act on the event */
		if (event.which == 3) {
			$(".bgList").hide();
		};
	});
	//点击桌面关闭换肤栏目
	$(".bg:not(.bgList)").click(function(event) {
		$(".bgList").hide();
	});
	//选择背景图片切换当前背景
	$(".bgList ul li").click(function(event) {
		/* Act on the event */
		var img_url = $(this).find('img').attr('src');
		$(".bg").css({
			'background-image': 'url('+img_url+')',
		});
	});
	//背景图片下一张上一张
	var i=0;
	$(document).on('click', '.bgList .prev', function(event) {
		if (i==0) {
			$('.bgList .prev').unbind("click");
		}else{
			i++;
			$(".bgList ul").animate({'left': 25*i+'%'}, 500);
		}
		
	});
	$(document).on('click', '.bgList .next', function(event) {
		if (i==-4) {
			$('.bgList .next').unbind("click");
		}else{
			i--;
			$(".bgList ul").animate({'left': 25*i+'%'}, 500);
		}
	});
	//$('[data-toggle="popover"]').popover();启用的是弹出框
	$('[data-toggle="tooltip"]').tooltip()//启用的是提示框
	//
	var flag = 0;
	var disableUse = $("#disableUse .modal-content").html();
	//console.log(disableUse);
	var modal_len = $(".appModal").length;
	//console.log(modal_len);
	if (flag == 1) {
		for (var i = 0; i < modal_len; i++) {
			$(".modal").eq(i).find('.modal-content').addClass('hide');
			$(".modal").eq(i).find('.modal-content.disabled').removeClass('hide');
			$(".modal").eq(i).find('.modal-content.disabled').append(disableUse);
		};
	};
	
})