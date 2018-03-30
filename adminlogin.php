<?php

    session_start();
    include('database.php');
    

    $error = [];
    if(array_key_exists('submit', $_POST)) { 
            if(empty($_POST['email'])) {
                $error['email'] = "Please enter a username";
            }

            if(empty($_POST['password'])) {
                $error['password'] = "Please enter your password";
            }

            if(empty($error)) {
                $clean = array_map('trim', $_POST);
                
                $log=array();
                $stmt=$conn->prepare("SELECT * FROM admin WHERE email=:email");
                $stmt->bindParam(":email", $_POST['email']);
                $stmt->execute();
                $row=$stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount() > 0){
                    if($_POST['password'] == $row['password']){
                        $log[]=true;
                        $log[]=$row['id'];
                    }
                }




                if($log[0]) {
                    // $_SESSION['studentid'] = $log[1];
                    header("location:adminhome.php");


                }
            }
            
            else {
                foreach($error as $err) {
                    echo $err;
                }
            }
        }
    
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<style>
  .button{
    border-radius: 10px;
    width: 900px;
    transition: 0.6s;
  }
</style>
</head>
<body>
  <center>
    <h1 class="title" style="margin-top: 30px">
      ADMIN LOGIN
    </h1>
  </center>
<form action="" method="post">
  <div class="field">
    <label for="" class="label">Username</label>
    <div class="control has-icons-left has-icons-right">
      <input type="text" name="email" class="input" value="admin">
      <span class="icon is-small is-left">
        <i class="fas fa-user"></i>
      </span>
     
  


  <div class="field">
    <label for="" class="label">Password</label>
    <div class="control has-icons-left has-icons-right">
      <input type="password" class="input" name="password" placeholder="Password Input" value="">
      <span class="icon is-small is-left">
        <i class="fas fa-key"></i>
      </span>
     <br><br>


<center>
<div class="field">
  <div class="">
 <input type="submit" class="button is-primary is-outlined" name="submit" >
</div>
</center>
  
</form>
</div>
</body>
</html>