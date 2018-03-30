<?php 
include 'database.php';
session_start();
$id = $_SESSION['id'];


function showFirstName($dbconn, $id) {
  $stmt = $dbconn->prepare("SELECT * FROM users WHERE id = :id");
  $stmt->bindParam(":id", $id);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_BOTH);
  $arr = [];
  $arr['fn'] = $row['Fullname'];
  return $arr['fn'];
}


?>
<!-- <script>console.log($id); </script> -->



<?php
if (isset($_POST['submit']))
{
  $nameFile = $_FILES['banner']["name"];
  $target = "images/";
  // $target = $target.basename($_FILES["banner"]["name"]);
  $nameOfFile = $_FILES['banner'];
  $url = "images/".basename($_FILES["banner"]["name"]);
  $check = move_uploaded_file($_FILES['banner']['tmp_name'], $url);
  // copy($FILES['banner']['tmp_name'],$url);
  require "config.php";
    
// $error = [];
//   if(array_key_exists('submit', $_POST)) {


  try 
  {
    $connection = new PDO($dsn, $username, $password, $options);

    $new_event = array(

      "MatricNumber" => $_POST['MatricNumber'],
      "name" => $_POST['name'],
      "description" => $_POST['description'],
      "ticket"  => $_POST['ticket'],
      "banner"  => $url,
      "host"  => $_POST['host'],
      "date"  => $_POST['date'],
  
    );

    $sql = sprintf(
        "INSERT INTO %s (%s) values (%s)",
        "post",
        implode(", ", array_keys($new_event)),
        ":" . implode(", :", array_keys($new_event))
    );
    
    $statement = $connection->prepare($sql);
    $statement->execute($new_event);
  }

  catch(PDOException $error) 
  {
    echo $sql . "<br>" . $error->getMessage();
  }
  
}

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Dashboard</title>

     <link href="navbar-top.css" rel="stylesheet">
   <link href="styles/font awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="bootstrap-4.0.0-beta/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- 
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->

    <link href="dashboard.css" rel="stylesheet">
    <style>
        a{  
          transition: .6s ease color;
          color: darkmagenta;

        }
      .nav-link:hover{
            background-color: black;
            color: white;
            transition: 0.6s;
              }

              input[type=text]{
                /*box-sizing: border-box;*/
                border-color:black;
                background-color: white;
                color:lightseagreen;
                border-radius: 10px;

              }
                input[type=date]{
                /*box-sizing: border-box;*/
                border-color:black;
                background-color: white;
                color:lightseagreen;
                border-radius: 10px;

              }
              textarea{
                /*box-sizing: border-box;*/
                border-color:black;
                background-color: white;
                color:lightseagreen;
                border-radius: 10px;

              }
              blockquote{
                color: black;
              }

              input[type=file]{
                background-color: black;
                color: white;
                border-radius: 10px;
                border-color: black;
              }

    </style>
  </head>

  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" style="font-family: Herculanum" href="home.php">BU Events</a>
       <i class="fa fa-user" style="color:white"> Logged In as: <?php $a = showFirstName($conn, $id); echo $a?></i>

</nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
          

          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="home.php"><i class="fa fa-home"></i> Home</a>
            </li ng-class="nav-item">
            
            <li class="nav-item">
              <a class="nav-link" href="makeevent.php"><i class="fa fa-spinner fa-spin"></i> Post Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="enquiry.php"><i class="fa fa-envelope"></i> Make Enquiries</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewenquiries.php"><i class="fa fa-question"></i> My Enquiries</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-search"></i> Replied Enquiries</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-eye"></i> View My Tickets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php"><i class="fa fa-user"></i> Logout</a>
            </li>
          </ul>

         
        </nav>

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
          <center><h1 style="font-family: Papyrus">POST AN EVENT</h1></center>

          <form action="" method="post" enctype="multipart/form-data">
          <section class="row text-center placeholders">
            <div class="col-6 col-sm-3 placeholder">
                                <?php 
            if (isset($_POST['submit']) && $statement) 
            { ?>
              <blockquote><?php echo $_POST['name']; ?> Has Been Successfully Posted!</blockquote>
            <?php 
            } ?>
              
              <label for="MatricNumber">Matric or Staff Number</label>
              <input type="text" name="MatricNumber">
              <label for="name">Event Name</label>
              <input type="text" name="name">
              <label for="description">Event Description</label>
              <textarea name="description" id="description" cols="100" rows="5"></textarea>
              <label for="ticket">Ticket Price</label>
              <input type="text" name="ticket" placeholder="(In Naira)"><br>
              <label for="flyer">Event Banner</label>
              <input type="file" name="banner"><br>
              <label for="host">Event Host</label><br>
              <input type="text" name="host"><br>
              <label for="date">Date</label><br>   
              <input type="date" name="date"><br><br>  
              <input type="submit"  class="btn btn-primary" name="submit" value="Submit">

            </div>
            </form>

          

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
