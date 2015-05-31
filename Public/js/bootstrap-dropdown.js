
$(document).ready(function() {
    $('.dropdown').hover(
		function () { 
			var e = $(this);
			t = setTimeout(function () { 
				e.find('.dropdown-menu').stop().slideDown(300); }, 350); 
				$(this).find('.dropdown-toggle').addClass('dropdown_hover'); },
		function () {  
			clearTimeout(t);
			$(this).find('.dropdown-menu').stop().slideUp(150); 
			$(this).find('.dropdown-toggle').removeClass('dropdown_hover'); }
	);
 });