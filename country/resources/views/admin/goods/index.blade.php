@extends('admin/layout/index')
@section('content')
	<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">浏览商品</h3>
					
					<div class="panel-options">
						<a href="#" data-toggle="panel">
							<span class="collapse-icon">&ndash;</span>
							<span class="expand-icon">+</span>
						</a>
						<a href="#" data-toggle="remove">
							&times;
						</a>
					</div>
				</div>
				<form action="/admin/goods" method="get">
						<div class="row-fluid">
						<div class="span6" style="width:350px;display:inline-block;margin-top:10px">
							<div id="DataTables_Table_0_length" class="dataTables_length" >
								<label>
									<select size="1" name="paginte" aria-controls="DataTables_Table_0" style="width:80px;height:27.6px;">

										<option value="10"
										@if(isset($sousuo['paginte'] ))
										@if($sousuo['paginte'] == '10')
											selected
										@endif
										@endif 
										>10</option>
										<option value="25" @if(isset($sousuo['paginte'] ))
										@if($sousuo['paginte'] == '25')
											selected
										@endif
										@endif >25</option>
										<option value="50" @if(isset($sousuo['paginte'] ))
										@if($sousuo['paginte'] == '50')
											selected
										@endif
										@endif >50</option>
										<option value="100" @if(isset($sousuo['paginte'] ))
										@if($sousuo['paginte'] == '100')
											selected
										@endif
										@endif >100</option>
										
									
									</select> 每页记录</label>
								</div>
							</div>
							<div class="span6" style="width:300px;display:inline-block;float:right;" >
								<div class="dataTables_filter" id="DataTables_Table_0_filter">
									<label>
										@if(isset($sousuo['sousuo']))
										<input type="text" aria-controls="DataTables_Table_0" style="height:27.6px" name="sousuo" value="{{ $sousuo['sousuo']  }}">
										@else
										<input type="text" aria-controls="DataTables_Table_0" style="height:27.6px" name="sousuo" value="">
										@endif
									</label>
									<input  type="submit" class="btn btn-success" value="搜索" style="margin-top:10px;height:30.6px">
								</div>
							</div>
						</div>
					</form>


				<div class="panel-body">
					
					<table class="table table-bordered table-striped" id="example-4">
						<thead>
							<tr>
								<th>商品名</th>
								<th>所属分类</th>
								<th>价格</th>
								<th>库存</th>
								<th>销量</th>
								<th>状态</th>
								<th>商品编号</th>
								<th>商品描述</th>
								<th>商品图片</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $k=>$v)
							<tr>
								<td><p style="width: 20px;height:70px; overflow:hidden; text-overflow:ellipsis;" title="{{ $v->gname }}">
										{{ $v->gname }}
									</p>
								</td>
								<td>{{ getCateName($v->goods_types_id) }}</td>
								<td>{{ $v->price }}</td>
								<td>{{ $v->stock }}</td>
								<td>{{ $v->sales }}</td>
								<td>
									@if($v->status == '0')新品
									@elseif($v->status == '1')上架
									@elseif($v->status == '2')下架
									@endif
								</td>
								<td>{{ $v->num }}</td>
								<td>
									<p style="width: 20px; overflow:hidden;white-space:nowrap; text-overflow:ellipsis;" title="{{ $v->content }}">
										{!! $v->content !!}
									</p>
								</td>
								
								
								<td>
									<img src="/public/images{{ $v->images }}" alt="图片" style="width:70px;height:70px;" >
								</td>
								<td>
									<a href="javascript:;" onclick="del({{ $v->id }},this)">
										<i class="fa fa-trash" title="删除">&nbsp;删除</i>
									</a>

									<a href="/admin/goods/version/{{ $v->id }}" >
										<i class="fa fa-cubes" title="版本加">&nbsp;版本加</i>
									</a>
									
									<a href="/admin/goods/edi/{{ $v->id }}" style="display:block;">
										<i class="fa fa-gavel"title="修改">修改</i>
									</a>
									<a href="javascript:;" onclick="show({{ $v->id }})">
										<i class="fa fa-search">详情</i>
									</a>
								</td>
							</tr>
							@endforeach
							
						</tbody>
					</table>
					
				</div>
			</div>
			<!-- 分页 -->
			<div>
		
				{{ $data->appends($sousuo)->links() }}
			</div>
<script>
	//layer详情弹窗
	function show(obj)
		{
					//iframe层

			layer.open({
			  type: 2,
			  title: '国商layer',
			  shadeClose: true,
			  shade: 0.8,
			  area: ['880px', '90%'],
			  content: '/admin/goods/'+obj //iframe的url
			}); 
		}
	//添加版本
	// function version(obj)
	// 	{
	// 				//iframe层

	// 		layer.open({
	// 		  type: 2,
	// 		  title: '国商layer',
	// 		  shadeClose: true,
	// 		  shade: 0.8,
	// 		  area: ['580px', '90%'],
	// 		  content: '/admin/goods/version/'+obj //iframe的url
	// 		}); 
	// 	}
	//无刷新删除
	function del(id,obj)
		{

			$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});
			
			if(!confirm('你确定删除吗?')){
				return false;
			}

			$.get('/admin/goods/del/'+id,function(msg){
				
				if(msg == 'success'){
					alert('删除成功!');
					$(obj).parent().parent().remove();
				}else if(msg == 'error'){
					alert('删除失败!');
				}
			},'html');


			

		}
</script>
@endsection