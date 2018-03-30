<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<table border="1">
		
<tr>
	<td colspan="" rowspan="" headers="" style="padding: 40px;">Image</td>
</tr>
<tr>
	<th style="padding: 20px;"><b><?php echo $result['name'];?></b></th>
</tr>
<tr>
	<td style="padding: 10px;"><i><?php echo $result['host'];?></i></td>
</tr>
<tr>
	
	<td style="padding: 10px;"><?php echo $result['description'];?></td>
</tr>

<tr>
	<td style="padding: 10px;"><?php echo $result['ticket'];?></td>
</tr>
<tr>
	<td style="padding: 10px;"><p><a class="btn btn-primary" href="#" role="button">Book A Ticket &raquo;</a></p></td>
</tr>


	</table>
</body>
</html>