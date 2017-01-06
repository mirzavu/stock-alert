<!DOCTYPE html>
<html>
<head>
	<title>Stock Alert {{$data->stock}}</title>
</head>
<body>
<table>
	<tr>
		<th>Stock</th>
		<td>{{$data->stock}}</td>
	</tr>
	<tr>
		<th>Percent</th>
		<td>{{$diff_percent}}</td>
	</tr>
	<tr>
		<th>Current Price</th>
		<td>{{$data->currentprice}}</td>
	</tr>
</table>
</body>
</html>