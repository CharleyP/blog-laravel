<div class="col-md-2 category">
  <div class="category-nav">
    @foreach($category1 as $val)
      <div class="active treeview">
          <a href="javascript:void(0)" class="category1">
            <span class="glyphicon glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>&nbsp;{{ $val->category1_name }}
          </a>
          <ul class="treeview-menu">
            @foreach($val->Category2 as $val)
              <li class="category2"><a href="{{url('alist/'.$val->category2_id)}}"><span class="glyphicon glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;<i>{{ $val->category2_name }}</i></a></li>
            @endforeach
          </ul>
        </div>
    @endforeach
  </div>
</div>