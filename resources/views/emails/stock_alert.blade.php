<!DOCTYPE html>
<html>
<head>
	<title>Stock Alert {{$stock->stock}}</title>
</head>
<body>
<table>
	<tr>
		<th>Stock</th>
		<td>{{$stock->stock}}</td>
	</tr>
	<tr>
		<th>Percent</th>
		<td>{{$diff_percent}}</td>
	</tr>
	<tr>
		<th>Current Price</th>
		<td>{{$stock->currentprice}}</td>
	</tr>
</table>
</body>
</html>