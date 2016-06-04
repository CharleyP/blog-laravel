$(document).ready(function() {
	$('.article-delete').click(function(event) {
		if (confirm('是否删除？')) {
			var article_id = $(this).siblings('.hidden-id').val();
			$.ajax({
				url: '/junchao/article/deleteArticle',
				type: 'post',
				dataType: 'json',
				data: {
					'article_id': article_id,
				},
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				},
				success:function(data){
					alert(data['msg']);
					window.location.reload();
				},
				error:function(){
					
				},
			})	
		};
	});
});