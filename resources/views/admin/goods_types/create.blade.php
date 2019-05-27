@extends('admin.layout.index')
@section('content')



<div class="panel panel-default" style="height:500px;">
	<div class="panel-heading">
		<h1 class="panel-title">类别添加</h1>
		<div class="panel-options">
			<a href="#" data-toggle="panel">
				<span class="collapse-icon">–</span>
				<span class="expand-icon">+</span>
			</a>
			<a href="#" data-toggle="remove">
				×
			</a>
		</div>
	</div>
	<div class="panel-body">
		
		<form role="form" class="form-horizontal"
		action="/admin/goods_types" method="post" enctype="multipart/form-data" id="file1">
		{{ csrf_field() }}
			<div class="form-group">
				<label class="col-sm-2 control-label">分类</label>
				<div class="col-sm-10">
					@if($a == 1)
					<select class="form-control" name="pid" disabled>
					@else
					<select class="form-control" name="pid">
					@endif
						<option value="0">请选择</option>
						@foreach($data as $k=>$v)
						@if($v->id == $id)
						<option selected value="{{ $v->id }}" >{{ $v->cname }}</option>
						@else
						<option value="{{ $v->id }}">{{ $v->cname }}</option>
						@endif
						@endforeach			
					</select>
				</div>
			</div>
			<div class="form-group has-warning">
				<label class="col-sm-2 control-label" for="field-7">分类名称</label>
				
				<div class="col-sm-10">
					<input type="text" class="form-control"  name="cname" >
				</div>
			</div>
			<div class="form-group has-success">
				<label class="col-sm-2 control-label" for="field-7">状态</label>
				
				<div class="col-sm-10">
					<input type="radio" class="form" value="1"  name="status" checked>启动
					<input type="radio" class="form" value="0" name="status" >禁用
				</div>
			</div>
		<input type="submit" value="提交" class="btn btn-success" >
		</form>
		
	</div>
</div>
	<script>

		
		
		
		// //无刷新上传
		// $('.form-control').change(function(){

		// 	$.ajaxSetup({
		// 	    headers: {
		// 	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		// 	    }
		// 	});



		// 	//发送ajax
		// 	$.ajax({
		// 		url:'/admin/goods',
		// 		type:'POST',
		// 		data:new FormData($('#upload')[0]),
		// 		processData:false,
		// 		contentType:false,
		// 		dataType:"json",
		// 		success:function(data){
		// 			alert(data);
		// 		}
		// 	});
		// })
	</script>
@endsection