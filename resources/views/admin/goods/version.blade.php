@extends('admin/layout/index')
@section('content')
	<div class="panel panel-default" style="height:420px;">
	<div class="panel-heading">
		<h1 class="panel-title">版本添加</h1>
		
	</div>
	<div class="panel-body">
		
		<form role="form" class="form-horizontal"
		action="/admin/goods/doversion/{{ $id }}" method="post" enctype="multipart/form-data" id="file1">
		{{ csrf_field() }}
			
			<div class="form-group has-success">
				<label class="col-sm-2 control-label" for="field-6">版本</label>
				
				<div class="col-sm-10">
					<input type="text" class="form-control"  name="version" value="{{ old('version') }}">
				</div>
			</div>
			<div class="form-group has-info">
				<label class="col-sm-2 control-label" for="field-6">颜色</label>
				
				<div class="col-sm-10">
					<input type="checkbox" name="color[]" value="black">黑色
					<input type="checkbox" name="color[]" value="white">白色
					<input type="checkbox" name="color[]" value="blue">蓝色
				</div>
			</div>

				
				<div id="preview" style="margin-top:30px;margin-left:120px;width:100%;height:70px;">            
           		</div > 
           		
				<div class="form-group" style="margin-left:50px">
                    <label class="col-sm-2 control-label" for="files"> <i class="fa fa-upload" title="上传附图">点我可上传</i></label>
					<div class="col-sm-10">
						<input type="file" class="form-control" id="files" name="files[]" multiple  onchange="javascript:setImagePreviews();" style="display:none;">
					</div>
					
				</div>
				<input type="submit" name="" value="提交" class="btn btn-success" >


		</form>
		
	</div>
</div>

<script>
	
</script>
<script>
	   //下面用于多图片上传预览功能
    function setImagePreviews(avalue) {
        var docObj = document.getElementById("files");
        var dd = document.getElementById("preview");
        dd.innerHTML = "";
        var fileList = docObj.files;
        for (var i = 0; i < fileList.length; i++) {
            dd.innerHTML += "<div style='float:left;margin-left:4px;' > <img id='img" + i + "'  /> </div>";
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

</script>
@stop