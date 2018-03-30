<?php

if (isset($_POST['submit']))
{
	
	require "config.php";
	require "common.php";

	try 
	{
		$connection = new PDO($dsn, $username, $password, $options);
		
		$new_user = array(
			// "firstname" => $_POST['firstname'],
			// "lastname"  => $_POST['lastname'],
			"Fullname" => $_POST['Fullname'],
			"email"     => $_POST['email'],
			"MatricNumber" => $_POST['MatricNumber'],
			"password"	=> $_POST['password']
			
		);

		$sql = sprintf(
				"INSERT INTO %s (%s) values (%s)",
				"users",
				implode(", ", array_keys($new_user)),
				":" . implode(", :", array_keys($new_user))
		);
		
		$statement = $connection->prepare($sql);
		$statement->execute($new_user);
	}

	catch(PDOException $error) 
	{
		echo $sql . "<br>" . $error->getMessage();
	}
	
}

?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		
		body{
	 margin-top: 5px;
    width: 300px; 
    border: 1px solid #d6d7da; 
	padding: 5px 15px 5px 15px; 
	border-radius: 5px;
	font-family: arial; 
	line-height: 16px;
	color: #333333; 
	font-size: 14px; 
	background-color: lightseagreen;
	}
	blockquote{
		color: black;
	}

.liki{
	color: white;
	text-decoration: none;
}


h3{
	color:#365D98}

form label{
	font-weight: bold;}

form label, form input{
	display: block;
	margin-bottom: 5px;
	width: 90%}

form input{ 
border: solid 1px #666666;
padding: 10px;
/*border: solid 1px #BDC7D8; */
margin-bottom: 20px
border-radius: 10px;
}
.button {
background-color: #5fcf80 ;
border-color: #3ac162;
font-weight: bold;
padding: 12px 15px;
max-width: 100px;
color: #ffffff;
}
.errorMsg{color: #cc0000;
	margin-bottom: 10px}

        input[type=submit]{
          border-radius: 15px;
          border-color: lightcoral;
        background-color: white;
        box-sizing: border-box;
        border: 2px solid black;
        color: lightseagreen;

      
        }

        input:hover{
          background-color: black;
          color: white;
          transition: 0.8s;
        }
        .label{
          font-family: sans-serif;

	</style>
	<title>Register</title>

	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	
<center>
<?php 
if (isset($_POST['submit']) && $statement) 
{ ?>
	<blockquote><?php echo $_POST['firstname']; ?> Successfully Added.</blockquote>
<?php 
} ?>

<h2 class="liki">USER REGISTRATION</h2>


<form method="post">
	<!-- <label for="firstname">First Name</label>
	<input type="text" name="firstname" id="firstname"><br>
	<label for="lastname">Last Name</label>
	<input type="text" name="lastname" id="lastname"><br> -->
	<label for="Fullname">Ful Name</label>
	<input type="text" name="Fullname" id="Fullname">
	<label for="email">Email Address</label>
	<input type="text" name="email" id="email"><br>
	<label for="MatricNumber">Matric or Staff Number</label>
	<input type="text" name="MatricNumber" id="MatricNumber"><br>
	<label for="password">Password</label>
	<input type="password" name="password" id="password"><br>
	
	<input type="submit" name="submit" value="Submit">

</form>


<a class="liki"	href="login.php">Back to home</a>
</center>
</body>
</html>