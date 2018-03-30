<?php

    session_start();
    include('database.php');
    

    $error = [];
    if(array_key_exists('loginSubmit', $_POST)) { 
            if(empty($_POST['email'])) {
                $error['email'] = "Please enter a username";
            }

            if(empty($_POST['password'])) {
                $error['password'] = "Please enter your password";
            }

            if(empty($error)) {
                $clean = array_map('trim', $_POST);
                
                $log=array();
                $stmt=$conn->prepare("SELECT * FROM users WHERE email=:email");
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
                    $_SESSION['id'] = $log[1];
                    header("location: home.php");


                }
            }
            
            else {
                foreach($error as $err) {
                    echo $err;
                }
            }
        }
    
?>



<html>
<head>

    <style>
    body{
        background-image: url('singapore.jpg');
        background-repeat: no-repeat;
    }
    h1{
        color: white;
    }
    input[type=text]{
        border-color: 2px solid black;
        border-radius: 10px;
        box-sizing: border-box;
        color: white;
        background-color:lightseagreen; 
        transition: 0.6s;
  }
  input[type=password]{
        border-color: 2px solid black;
        border-radius: 10px;
        box-sizing: border-box;
        color: white;
        transition: 0.6s;
        background-color:lightseagreen; 
    }
    input:hover{
        background-color: black;
        color: white;
    }
    header{
        padding: 0;
        margin: 0;
    }
   
#login{
    margin-top: 30px;
    
width: 300px; 
border: 1px solid #d6d7da; 
padding: 15px 15px 15px 15px; 
border-radius: 5px;
font-family: arial; 
line-height: 16px;
color: #333333; 
font-size: 14px; 
background: #ffffff;

}
.lik{
    color: #00ffcc;
    text-decoration:none;
    font-family: sans-serif;
    padding: 0px 10px 30px 250px;

}
.lik:hover{
    color: black;
    transition: 0.6s;
}

.liki{
    text-decoration: none;
    color: black;
    font-family: helvetica;
}


h3{color:#5fcf80 ;
font-family: Papyrus;

}

form label{font-weight: bold;}

form label, form input{
    display: block;
    margin-bottom: 5px;
    width: 90%}

form input{ 
border: solid 1px #666666;padding: 10px;
border: solid 1px #BDC7D8; margin-bottom: 20px
}
.button {
background-color: #5fcf80 ;
border-color: #3ac162;
font-weight: bold;
padding: 12px 15px;
max-width: 100px;
color: #ffffff;
}
.button:hover{
    background-color: black;
    color: white;
    transition: 0.8s;
}
.errorMsg{color: #cc0000;margin-bottom: 10px}
    </style>
</head>
<body>
   

<center>
   <h1 style="font-family: Herculanum">BU EVENTS</h1>
<div id="login">
    
<h3>SIGN IN</h3>
<form method="post" action="login.php?=<?php echo $_SESSION['id']; ?>" name="login">

<label>Email</label>
<input type="text" name="email">

<label>Password</label>
<input type="password" name="password">

<div class="errorMsg"><?php echo $errorMsgLogin; ?></div>
<input type="submit" class="button" name="loginSubmit" value="Login">
<a class="liki" href="register.php">Not Registered? Click Here</a><br>
<a class="lik" href="adminlogin.php" style="font-family: Herculanum">ADMIN</a>
</form>
</div>
</center>
</body>
</html>