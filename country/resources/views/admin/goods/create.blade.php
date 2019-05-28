@extends('admin.layout.index')
@section('content')

<!-- 显示验证错误信息 -->
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
<!-- 结束 -->

<div class="panel panel-default">
	<div class="panel-heading">
		<h1 class="panel-title">商品添加</h1>
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
		action="/admin/goods" method="post" enctype="multipart/form-data" id="file1">
		{{ csrf_field() }}
			<div class="form-group">
				<label class="col-sm-2 control-label">分类</label>
				<div class="col-sm-10">
					<select class="form-control" name="pid">
						
						@foreach($data as $k=>$v)
						<option value="{{ $v->id }}">{{ $v->cname }}</option>
						
						@endforeach			
					</select>
				</div>
			</div>
			<div class="form-group has-error">
				<label class="col-sm-2 control-label" for="field-6">商品名称</label>
				
				<div class="col-sm-10">
					<input type="text" class="form-control"  name="gname" value="{{ old('gname') }}">
				</div>
			</div>
			
			
			
			<div class="form-group has-warning">
				<label class="col-sm-2 control-label" for="field-7">商品价格</label>
				
				<div class="col-sm-10">
					<input type="text" class="form-control"  name="price"  value="{{ old('price') }}">
				</div>
			</div>
			
			
			
			<div class="form-group has-success">
				<label class="col-sm-2 control-label" for="field-8">库存</label>
				
				<div class="col-sm-10">
					<input type="text" class="form-control"  name="stock"  value="{{ old('stock') }}">
				</div>
			</div>
			
			
			
			<div class="form-group has-info">
				<label class="col-sm-2 control-label" for="field-9">销量</label>
				
				<div class="col-sm-10">
					<input type="text" class="form-control" name="sales" value="{{ old('sales') }}">
				</div>
			</div>
			

			<div class="form-group">
				<label class="col-sm-2 control-label">状态</label>
				
				<div class="col-sm-10">
					<select class="form-control" name="status">
						<option value="0">新品</option>
						<option value="1">上架</option>
						<option value="2">下架</option>
						@if( old('status')== '0' )
						<option value="0" selected>新品</option>
						@elseif( old('status')== '1' )
						<option value="1" selected>上架</option>
						@elseif( old('status')== '2' )
						<option value="2" selected>下架</option>
						@endif
					</select>
				</div>
			</div>
		
			

			<input type="hidden" name="num"> 
			
			
		
				
			
			<div class="form-group has-warning">
				<label class="col-sm-2 control-label" for="field-7">商品描述</label>
				

				<div class="col-sm-10" style="width:570px;">
					<!-- 加载编辑器的容器 -->
<script id="container" name="content" type="text/plain">
{{ old('content') }}
</script>
				</div>
			</div>
				<div style="margin-left:180px;width:70px;height:70px;">
					<img src="/a.jpg" alt="图片" style="width:70px;height:70px;" id="img_url" >
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="field-4">商品主图</label>
					
					<div class="col-sm-10">
						<input type="file" class="form-control" id="images" name="images" onchange="url()">
					</div>
				</div>
				  
				<input type="submit" name="" value="提交" class="btn btn-success" >


		</form>
		
	</div>
</div>
 <!-- 实例化编辑器 -->
    <script type="text/javascript">
         var ue = UE.getEditor('container',{toolbars: [
    ['fullscreen', 'source', 'undo', 'redo', 'bold']
]});

        $('.alert-danger').eq(0).click(function(){
        	$(this).css('display','none');
        });

    </script>
	<script>
	$('#img_url').css('display','none');	
//这里是单文件上传预览功能		
$("#images").change(function(event){
	var files = event.target.files;
	var file;
	
	if (files && files.length > 0) {
		file = files[0];
		
		var URL = window.URL || window.webkitURL;
		// 本地图片路径
		var imgURL = URL.createObjectURL(file);
		
		var imgObj = $('#img_url').eq(0);
		imgObj.attr("src", imgURL);
		imgObj.show();
	}
});


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