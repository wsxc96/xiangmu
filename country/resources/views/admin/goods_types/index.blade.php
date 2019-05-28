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
				<form action="/admin/goods_types" method="get">
						<div class="row-fluid">
						<div class="span6" style="width:350px;display:inline-block;margin-top:10px;">
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
							<div class="span6" style="width:300px;display:inline-block;float:right;">
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
								<th>ID</th>
								<th>分类名称</th>
								<th>所属分类id</th>
								<th>分类路径</th>
								<th>状态</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $k=>$v)
							<tr>
								<td>{{ $v->id }}</td>
								<td>{{ $v->cname }}</td>
								
								<!-- 自定义函数 -->
								<td>{{ getCateName($v->pid) }}</td>
								<td>{{ $v->path }}</td>
								<td>
									@if($v->status == 0)禁用
									@elseif($v->status == 1)启动
									@endif
								</td>
								<td>
									<a href="/admin/goods_types/del/{{ $v->id }}" >
										<i class="fa fa-trash" title="删除">&nbsp;删除</i>
									</a>

									<a href="/admin/goods_types/create/{{ $v->id }}/{{ $a = 1 }}" >
										<i class="fa fa-plus"></i>添加子分类</i>
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
	
</script>
@endsection