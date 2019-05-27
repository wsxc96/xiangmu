<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/assets/css/fonts/linecons/css/linecons.css">
	<link rel="stylesheet" href="/assets/css/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/assets/css/bootstrap.css">
	<link rel="stylesheet" href="/assets/css/xenon-core.css">
	<link rel="stylesheet" href="/assets/css/xenon-forms.css">
	<link rel="stylesheet" href="/assets/css/xenon-components.css">
	<link rel="stylesheet" href="/assets/css/xenon-skins.css">
	<link rel="stylesheet" href="/assets/css/custom.css">


	<link rel="stylesheet" href="/assets/css/xenon-core.css">

	<script src="/assets/js/jquery-1.11.1.min.js"></script>

</head>
<body>
	 <div class="panel panel-default">
						
		<div class="panel-body panel-border">
		
			<div class="row">
				<div class="col-sm-12">
				
					<!-- Table Model 2 -->
					<strong>商品详情页</strong>
					
					<table class="table table-model-2 table-hover">
						<thead>
							<tr>
								<th>商品id</th>
								<th>版本</th>
								<th>颜色</th>
								<th>商品附图</th>
							</tr>
						</thead>	
						<tbody>
							
							
							@foreach($good as $k=>$v)
							<tr>
								<td>{{ $goods->id }}</td>
								<td>{{ $v->version }}</td>
								<td>
									@foreach($v->goods_details as $kkk=>$vvv)
									<img src="/public/files{{ $vvv->files }}" alt="图片" style="width:70px;height:70px;" >
									@endforeach
								</td>
								<td>
										@php
											$a = explode(',',$v->color);
											
											$d = count($a);
										@endphp
										@for($s = 0;$s < $d;$s++)
										<div style="width:20px;height:20px;background:{{ $a[$s] }};display:inline-block">
										</div>
										@endfor
									</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				
				</div>
			</div>
		
		</div>
		
	</div>
</body>
</html>