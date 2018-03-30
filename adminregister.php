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

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<link href="styles/font awesome/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
	<?php 
if (isset($_POST['submit']) && $statement) 
{ ?>
	<blockquote><?php echo $_POST['Fullname']; ?> Successfully Registered.</blockquote>
<?php 
} ?>
	<center>
		<h1 class="title is-1">REGISTER A USER</h1>
		<form action="" method="post">
<div class="field">
    <label for="" class="label">Full Name</label>
	    	<div class="control has-icons-left has-icons-right">
	      <input type="text" class="input" name="Fullname" placeholder="Full Name" value="**">
	      <span class="icon is-small is-left">
	        <i class="fas fa-user"></i>
	      </span>
	       </div>
 </div>

 <div class="field">
	<label for="" class="label">Email</label>
			<div class="control has-icons-left has-icons-right">
				<input type="text" class="input" name="email" placeholder="Email" value="">
				<span class="icon is-small is-left">
					<i class="fas fa-envelope"></i>
				</span>
			</div>
</div>
 <div class="field">
	<label for="" class="label">Matric Or Staff Number</label>
			<div class="control has-icons-left has-icons-right">
				<input type="text" class="input" name="MatricNumber" placeholder="Matric Or Staff Number" value="">
				<span class="icon is-small is-left">
					<i class="fas fa-hashtag"></i>
				</span>
			</div>
</div>
 <div class="field">
	<label for="" class="label">Password</label>
			<div class="control has-icons-left has-icons-right">
				<input type="password" class="input" name="password" placeholder="Password" value="">
				<span class="icon is-small is-left">
					<i class="fas fa-key"></i>
				</span>
			</div>
</div>
 <div class="field">
	<label for="" class="label"> Retype Password</label>
			<div class="control has-icons-left has-icons-right">
				<input type="password" class="input" name="password" placeholder="Re-type Password" value="">
				<span class="icon is-small is-left">
					<i class="fas fa-key"></i>
				</span>
				<script>
					var input = getElementById('input');
					if( input == true;
						<input type="password" class="input is-success" value="">
						)

				</script>
			</div>
</div>
<div class="field is-grouped">
  <div class="control">
    <button class="button is-primary" name="submit" value="submit" style="margin-left: 600px" >Submit</button>

  </div>
</form>
<a href="adminhome.php" class="button is-link">Back Home</a>
</center>
</body>
</html>