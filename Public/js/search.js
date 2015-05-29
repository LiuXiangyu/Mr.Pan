$(function(){
	var perpage = 5, currentpage = 0;
	var comments = $('.content');

	/*
	翻页，更新页面
	*/
	function showpage(objs) {
		comments.each(function(i) {
			if (parseInt(i / perpage) == currentpage) {
				$(this).show();
			} else {
				$(this).hide();
			}
		});
	}

	/*
	初始化翻页导航
	*/
	function page() {
		showpage();
		var pagenav = $('#pagenav');
		var prev = $('<span/>').text('<前页').addClass('prev');
		var next = $('<span/>').text('后页>').addClass('next');
		prev.click(function() {
			if (currentpage <= 0) {
				return;
			} else {
				currentpage--;
				$('.curpage').prev().click();
			}
		});
		next.click(function() {
			if (currentpage >= comments.length / perpage) {
				return;
			} else {
				currentpage++;
				$('.curpage').next().click();
			}
		});

		pagenav.append(prev);
		for (var i = 0; i <= comments.length / perpage; ++i) {
			var a = $('<span/>').text((i+1).toString());
			if (i == 0) {
				a.addClass('curpage');
			}
			a.click(function() {
				$('.curpage').removeClass('curpage');
				currentpage = parseInt($(this).html()) - 1;
				showpage();
				$(this).addClass('curpage');
			})
			$('#pagenav').append(a);
		}
		pagenav.append(next);

	}
	page();
});