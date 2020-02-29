<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="UTF-8">
		<title>Excel to DB</title>
		<style>
			select{
				width: 100px;
			}
						
			span, label{
				font-size: 20px;
			}
			
			span{
				margin-left: 10px;
			}
		</style>
	</head>
	<body>
		<h3>Title Sheet</h3>
		<form action="{{route('title_sheet')}}" method="post" enctype="multipart/form-data">
			@csrf
			<input type="file" name="file">
			<input type="submit">
		</form>
		
		<h3>Content Sheet</h3>
		<form action="{{route('content_sheet')}}" method="post" enctype="multipart/form-data">
			@csrf
			<select name="title_sheet_id">
				<option value="sheet"><-- Sheet --></option>
				@foreach($title_sheet as $v)
					@if(count($v->ContentSheet) == 0)
						<option value="{{$v->id}}">{{$v->name}}</option>
					@endif
				@endforeach
			</select>
			
			<input type="file" name="file">
			<input type="submit">
		</form>
		
		<h3>Total Money Of The Month</h3>
		<form action="{{route('total_money_month')}}" method="post" enctype="multipart/form-data">
			@csrf
			<select name="month">
				@for($i = 1; $i <= 12; $i++)
					<option value="{{$i}}">Tháng {{$i}}</option>
				@endfor
			</select>
			
			<select name="year">
				@for($i = 2019; $i <= $year; $i++)
					<option value="{{$i}}">{{$i}}</option>
				@endfor
			</select>
			<input type="submit">
			<span class="money">{{session('total_money_month') ? session('total_money_month') : 0}}</span>
			<label> VND</label>
		</form>
		
		<h3>Total Money Of The Year</h3>
		<form action="{{route('total_money_year')}}" method="post" enctype="multipart/form-data">
			@csrf			
			<select name="year">
				@for($i = 2019; $i <= $year; $i++)
					<option value="{{$i}}">{{$i}}</option>
				@endfor
			</select>
			<input type="submit">
			<span class="money">{{session('total_money_year') ? session('total_money_year') : 0}}</span>
			<label> VND</label>
		</form>
		
		<script src="{{asset('js/jquery.min.js')}}"></script>
		<script src="{{asset('js/simple.money.format.js')}}"></script>
		<script>
			$(document).ready(function(){
				$('.money').simpleMoneyFormat();
			});
		</script>
	</body>
</html>