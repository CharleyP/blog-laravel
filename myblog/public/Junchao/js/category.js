$(document).ready(function() {
    var flag = 1;
    $('table .cate1 td span.glyphicon').click(function(event) {
        if (flag == 1) {
            $(this).removeClass('glyphicon-plus').addClass('glyphicon-minus');
            flag = 0;
            $(this).parents('tbody').find('.cate2').removeClass('hide');
        }else{
            $(this).removeClass('glyphicon-minus').addClass('glyphicon-plus');
            flag = 1;
            $(this).parents('tbody').find('.cate2').addClass('hide');
        }
    });
    $('table .cate1 td .cate2-show').click(function(event) {
        if (flag == 1) {
            $(this).parents('.cate1').find('td span').removeClass('glyphicon-plus').addClass('glyphicon-minus');
            flag = 0;
            $(this).parents('tbody').find('.cate2').removeClass('hide');
        }else{
            $(this).parents('.cate1').find('td span').removeClass('glyphicon-minus').addClass('glyphicon-plus');
            flag = 1;
            $(this).parents('tbody').find('.cate2').addClass('hide');
        }
    });
    //添加一级栏目
    $('.cate1-add').click(function(event) {
        layer.open({
            type: 1,
            title: false,
            closeBtn: 0,
            shadeClose: true,
            skin: 'yourclass',
            content: '<div class="add-layer1"><h4 class="text-center">请输入一级栏目名称</h4><input type="text" value="" class="add-content1" /><label>是否在主页显示<input type="checkbox" value="" class="add-check1" /></label> <a href="javascript:void(0)" class="btn btn-default add-sub1">确认添加</a></div>',
        });
    });
    $('body').on('click', '.add-sub1', function(event) {
        event.preventDefault();
        var category1_show = '';
        if ($('.add-layer1 .add-check1').is(':checked')) {
            category1_show = 1;
        }else{
            category1_show = 0;
        }
        var category1_name = $('.add-layer1 .add-content1').val();
        $.ajax({
            url: '/junchao/category/addCategory1',
            type: 'post',
            dataType: 'json',
            data: {
                category1_name: category1_name,
                category1_show: category1_show,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success:function(data){
                alert(data['msg']);
                window.location.reload();
            },
            error:function(data){
                alert('添加失败，请重试');
            },
        })
    });
    //添加二级栏目
    var category1_id = '';
    $('.cate2-add').click(function(event) {
        category1_id = $(this).parents('tbody').find('.cate1 td .cate1-id').val();
        layer.open({
            type: 1,
            title: false,
            closeBtn: 0,
            shadeClose: true,
            skin: 'yourclass',
            content: '<div class="add-layer2"><h4 class="text-center">请输入二级栏目名称</h4><input type="text" value="" class="add-content2" /><label>是否在主页显示<input type="checkbox" value="" class="add-check2" /></label> <a href="javascript:void(0)" class="btn btn-default add-sub2">确认添加</a></div>',
        }); 
    });
    $('body').on('click', '.add-sub2', function(event) {
        event.preventDefault();
        var category2_show = '';
        if ($('.add-layer2 .add-check2').is(':checked')) {
            category2_show = 1;
        }else{
            category2_show = 0;
        }
        var category2_name = $('.add-layer2 .add-content2').val();
        console.log(category2_show);
        console.log(category2_name);
        console.log(category1_id);
        $.ajax({
            url: '/junchao/category/addCategory2',
            type: 'post',
            dataType: 'json',
            data: {
                category2_name: category2_name,
                category2_show: category2_show,
                category1_id: category1_id,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success:function(data){
                alert(data['msg']);
                window.location.reload();
            },
            error:function(data){
                alert('添加失败，请重试');
            },
        })
    });
    //删除二级栏目
    $('.cate2 .cate2-delete').click(function(event) {
        var category2_id = $(this).parents('.cate2').find('.cate2-id').val();
        if (confirm('此操作将删除该栏目下所有文章，你确定这样做吗？')) {
            $.ajax({
                url: '/Junchao/category/deleteCategory2',
                type: 'post',
                dataType: 'json',
                data: {
                    category2_id: category2_id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success:function(data){
                    alert(data['msg']);
                    window.location.reload();
                },
                error:function(data){
                    alert('删除失败，请重试');
                },
            })
        };
    });
    //修改二级栏目
    var category2_id = '';
    $('.cate2-change').click(function(event) {
        category2_id = $(this).parents('.cate2').find('.cate2-id').val();
        layer.open({
            type: 1,
            title: false,
            closeBtn: 0,
            shadeClose: true,
            skin: 'yourclass',
            content: '<div class="change-layer2"><h4 class="text-center">请输入二级栏目名称</h4><input type="text" value="" class="change-content2" /><label>是否在主页显示<input type="checkbox" value="" class="change-check2" /></label> <a href="javascript:void(0)" class="btn btn-default change-sub2">确认添加</a></div>',
        }); 
    });
    $('body').on('click', '.change-sub2', function(event) {
        event.preventDefault();
        var category2_show = '';
        if ($('.change-layer2 .change-check2').is(':checked')) {
            category2_show = 1;
        }else{
            category2_show = 0;
        }
        var category2_name = $('.change-layer2 .change-content2').val();
        console.log(category2_show);
        console.log(category2_name);
        console.log(category2_id);
        $.ajax({
            url: '/junchao/category/changeCategory2',
            type: 'post',
            dataType: 'json',
            data: {
                category2_name: category2_name,
                category2_show: category2_show,
                category2_id: category2_id,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success:function(data){
                alert(data['msg']);
                window.location.reload();
            },
            error:function(data){
                alert('修改失败，请重试');
            },
        })
    });
    //修改一级栏目
    var change_category1_id = '';
    $('.cate1-change').click(function(event) {
        change_category1_id = $(this).parents('.cate1').find('.cate1-id').val();
        layer.open({
            type: 1,
            title: false,
            closeBtn: 0,
            shadeClose: true,
            skin: 'yourclass',
            content: '<div class="change-layer1"><h4 class="text-center">请输入一级栏目名称</h4><input type="text" value="" class="change-content1" /><label>是否在主页显示<input type="checkbox" value="" class="change-check1" /></label> <a href="javascript:void(0)" class="btn btn-default change-sub1">确认添加</a></div>',
        }); 
    });
    $('body').on('click', '.change-sub1', function(event) {
        event.preventDefault();
        var category1_show = '';
        if ($('.change-layer1 .change-check1').is(':checked')) {
            category1_show = 1;
        }else{
            category1_show = 0;
        }
        var category1_name = $('.change-layer1 .change-content1').val();
        console.log(category1_show);
        console.log(category1_name);
        console.log(change_category1_id);
        $.ajax({
            url: '/junchao/category/changeCategory1',
            type: 'post',
            dataType: 'json',
            data: {
                category1_name: category1_name,
                category1_show: category1_show,
                category1_id: change_category1_id,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success:function(data){
                alert(data['msg']);
                window.location.reload();
            },
            error:function(data){
                alert('修改失败，请重试');
            },
        })
    });
})