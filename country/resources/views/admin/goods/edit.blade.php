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
		<h1 class="panel-title">商品修改</h1>
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
		action="/admin/goods/{{ $data->id }}" method="post" enctype="multipart/form-data" id="file1">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
			
			<div class="form-group">
				<label class="col-sm-2 control-label">分类</label>
				<div class="col-sm-10">
					<select class="form-control" name="pid">
						<option value="0">请选择</option>
						@foreach($datas as $k=>$v)
						@if($v->id == $id)
						<option selected value="{{ $v->id }}" >{{ $v->cname }}</option>
						@else
						<option value="{{ $v->id }}">{{ $v->cname }}</option>
						@endif
						@endforeach			
					</select>
				</div>
			</div>

			<div class="form-group has-error">
				<label class="col-sm-2 control-label" for="field-6">商品名称</label>
				
				<div class="col-sm-10">
					<input type="text" class="form-control"  name="gname" value="{{ $data->gname }}">
				</div>
			</div>
			
			
			
			<div class="form-group has-warning">
				<label class="col-sm-2 control-label" for="field-7">商品价格</label>
				
				<div class="col-sm-10">
					<input type="text" class="form-control"  name="price"  value="{{ $data->price }}">
				</div>
			</div>
			
			
			
			<div class="form-group has-success">
				<label class="col-sm-2 control-label" for="field-8">库存</label>
				
				<div class="col-sm-10">
					<input type="text" class="form-control"  name="stock"  value="{{ $data->stock }}">
				</div>
			</div>
			
			<div class="form-group has-warning">
				<label class="col-sm-2 control-label" for="field-9">商品编号</label>
				
				<div class="col-sm-10">
					<input type="text" class="form-control" name="num" value="{{ $data->num }}">
				</div>
			</div>
			
			
			<div class="form-group has-info">
				<label class="col-sm-2 control-label" for="field-9">销量</label>
				
				<div class="col-sm-10">
					<input type="text" class="form-control" name="sales" value="{{ $data->sales }}">
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label">状态</label>
				
				<div class="col-sm-10">
					<select class="form-control" name="status">
						<option value="0" @if($data->status == '0') selected  @endif>新品</option>
						<option value="1" @if ($data->status == '1')  selected @endif>上架</option>
						<option value="2" @if ($data->status == '2')  selected @endif>下架</option>
						
					</select>
				</div>
			</div>
			
			
			<div class="form-group has-warning">
				<label class="col-sm-2 control-label" for="field-7">商品描述</label>
				

				<div class="col-sm-10" style="width:570px;">
					<!-- 加载编辑器的容器 -->
<script id="container" name="content" type="text/plain">
{{ $data->content }}
</script>
				</div>
			</div>
				<div style="margin-left:130px;width:70px;height:70px;">
					<img src="/public/images/{{ $data->images }}" alt="图片" style="width:70px;height:70px;" id="img_url" >
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="field-4">商品主图</label>
					
					<div class="col-sm-10">
						<input type="file" class="form-control" id="images" name="images" onchange="url()">
					</div>
				</div>
				  <div id="preview" style="margin-left:120px;width:100%;height:40px;">              
           		</div >
				
           		
				<input type="submit" name="" value="提交" class="btn btn-success" >


		</form>
		
	</div>
</div>
 <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');

        $('.alert-danger').eq(0).click(function(){
        	$(this).css('display','none');
        });

    </script>
	<script>
		
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

    //下面用于多图片上传预览功能
    function setImagePreviews(avalue) {
    	$('#img_ur').eq(0).hide();
        var docObj = document.getElementById("files");
        var dd = document.getElementById("preview");
        dd.innerHTML = "";
        var fileList = docObj.files;
        for (var i = 0; i < fileList.length; i++) {
            dd.innerHTML += "<div style='float:left' > <img id='img" + i + "'  /> </div>";
            var imgObjPreview = document.getElementById("img"+i);
            if (docObj.files && docObj.files[i]) {
                //火狐下，直接设img属性
                imgObjPreview.style.display = 'block';
                //控制缩略图大小
                imgObjPreview.style.width = '70px';
                imgObjPreview.style.height = '70px';
                //imgObjPreview.src = docObj.files[0].getAsDataURL();
                //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
                imgObjPreview.src = window.URL.createObjectURL(docObj.files[i]);
            }
            else {
                //IE下，使用滤镜
                docObj.select();
                var imgSrc = document.selection.createRange().text;
                alert(imgSrc)
                var localImagId = document.getElementById("img" + i);
                //必须设置初始大小
                localImagId.style.width = "70px";
                localImagId.style.height = "70px";
                //图片异常的捕捉，防止用户修改后缀来伪造图片
                try {
                    localImagId.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                    localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
                }
                catch (e) {
                    alert("您上传的图片格式不正确，请重新选择!");
                    return false;
                }
                imgObjPreview.style.display = 'none';
                document.selection.empty();
            }
        }
        return true;
    }

		
		
		
		
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