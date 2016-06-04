$(document).ready(function() {
	$('.category1 .select-category1 select').change(function(event) {
		var category1_id = $(this).val();
		$.ajax({
			url: '/junchao/article/getCategory1',
			type: 'post',
			dataType: 'json',
			data: {
				'category1_id': category1_id,
			},
			headers: {
				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			},
			success:function(data){
				var category2 = '<option value="">请选择二级列表</option>';
				for (var i = 0; i < data.length; i++) {
					category2 += '<option value="'+data[i]['category2_id']+'">'+data[i]['category2_name']+'</option>';
				};
				$('.category2 .select-category2 select').empty();
				$('.category2 .select-category2 select').append(category2);
			},
			error:function(data){
				alert('加载错误，请重试');
			},
		})
	});
	$('.change-submit a').click(function(event) {
		var article_id = $('.article-id').val();
		var article_title = $('.article_title').val();
		if (article_title == '') {
			alert('请输入文章标题');
		};
		var article_info = $('.info textarea').val();
		if (article_info == '') {
			alert('请输入文章简介');
		};
		var article_content = ue.getContent();
		if (article_content == '') {
			alert('请输入文章内容');
		};
		var category2_id = $('.category2 .select-category2 select').val();
		if (category2_id == '') {
			alert('请选择文章分类');
		};
		var article_img = $('#file_upload').val();
			article_img = $.parseJSON(article_img);
		var article_img_url = article_img['msg'];
		if (article_img_url == '') {
			alert('请上传文章封面');
		};
		if (article_title != '' && article_content != '' && category2_id != '' && article_info != '' && article_img_url !='') {
			$.ajax({
				url: '/junchao/article/changeArticle',
				type: 'post',
				dataType: 'json',
				data: {
					'article_id': article_id,
					'category2_id': category2_id,
					'article_title': article_title,
					'article_info': article_info,
					'article_content': article_content,
					'article_img': article_img_url,
				},
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				},
				success:function(data){
					alert(data['msg']);
					window.location = '/junchao/article';
				},
				error:function(data){
					alert('修改错误');
				},
			})
		};
	});
});