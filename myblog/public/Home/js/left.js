$(function(){
	$(".category .treeview a.category1").click(function(event) {
		$(this).siblings('.treeview-menu').slideToggle();
	});
})