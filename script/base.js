function addToFavorite(url, title) {
	try {
		window.external.addFavorite(url, title);
	} catch (e){
		try {
			window.sidebar.addPanel(title, url, '');
        	} catch (e) {
			alert("对不起，您的浏览器不支持此操作!请您使用菜单栏或Ctrl+D收藏本站。");
		}
	}
}

function slide($n)
{
	var config = {interval:4000, fadeInTime:300, fadeOutTime:300};
	var curIndex = 0;
	var slide = null;
	var subObjTit = $("div#slide_controls_"+$n+" span");
	var subObjPic = $("ul#slide_items_"+$n+" li");
	var subObjCount = subObjTit.length;
	var slideStop = function(){window.clearInterval(slide)};
	var slideStart = function(a){
		slideStop();
		slide = window.setInterval(function(){slideFunc()}, config.interval);
	}
	var slideFunc = function(ind){
		if(ind || ind == 0){curIndex = ind || 0}
		else{
			curIndex = (curIndex >= (subObjCount - 1)) ? 0 : (++ curIndex)}
			subObjPic.filter(":visible").fadeOut(config.fadeOutTime, function(){
				subObjPic.eq(curIndex).fadeIn(config.fadeInTime);
				subObjPic.removeClass("cur").eq(curIndex).addClass("cur");
			});
			subObjTit.removeClass("cur").eq(curIndex).addClass("cur");
		}
	//添加标题的鼠标事件
		subObjTit.hover(function(){
			if($(this).attr('class') != 'cur'){
				slideStop();
				var i = $.inArray(this, subObjTit);
				slideFunc(i);
			}
			else{
				slideStop();
			}
	}, slideStart);
	slideStart(); 
}

function get_randfunc(obj)
{
	var sj = Math.random();
	obj.src=obj.src+'?shuiji=' +sj;
}
function error(id,text)
{
	$("#"+id).show();
	Width=document.body.clientWidth/2-60;
	Height=document.body.clientHeight/2;
	$('#'+id).offset({top:Height,left:Width});
	$('#'+id).html(text);
	function closefunc()
	{
		$('#'+id).html("");
		$('#'+id).hide();
	}
	setTimeout(closefunc,1000);
}