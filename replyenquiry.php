<?php  
include 'database.php';

?>

<?php
if (isset($_POST['submit']))
{
  
  require "config.php";
 

  try 
  {
    $connection = new PDO($dsn, $username, $password, $options);

    $new_complaint = array(

      "MatricNumber" => $_POST['MatricNumber'],
      "enquiry" => $_POST['enquiry'],
 );
    
  

    $sql = sprintf(
        "INSERT INTO %s (%s) values (%s)",
        "reply",
        implode(", ", array_keys($new_complaint)),
        ":" . implode(", :", array_keys($new_complaint))
    );
    
    $statement = $connection->prepare($sql);
    $statement->execute($new_complaint);
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
	<link rel="stylesheet" href="">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <style>
    	.button{
    		margin-top: 30px;
    		width: 900px;
    		box-sizing: border-box;
    		transition: 0.6s;
    	}
    	blockquote{
    		color: darkorchid;
    	}
    </style>
</head>
<body>
	<nav class="navbar is-dark">
		<h1 class="title is-1" style="color: whitesmoke">ADMINISTRATOR</h1>
	</nav>

	<center><h1 class="title is-1" style="margin-top: 30px">REPLY ENQUIRY</h1></center>
	      
	      <?php 
if (isset($_POST['submit']) && $statement) 
{ ?>
  <blockquote>Enquiry Successfully Addressed.</blockquote>
<?php 
} ?>



	<div class="block">
		<div class="control">
			<label for="" class="label is-1">User Matric/Staff Number</label>
			<table class="table is-small ">
				<tr>
					<td class="input is-1 is-primary"><i class="fas fa-hashtag"> </i> <input type="text" class="input is-small" name="MatricNumber"></td>
				</tr>
			</table>
			<label for="" class="label">Reply Enquiry Here <i class="fas fa-arrow-down"></i></label>
			<textarea name="enquiry" id="" class="textarea is-primary" cols="30" rows="10"></textarea>
</div>		
	</div>
			<center><button type="submit" class="button is-primary is-outlined" name="submit" value="Post Reply">Post Reply</button></center>
		
	<center><a href="adminhome.php"><button class="button is-info is-outlined">Return Home</button></a></center>
</body>
</html>