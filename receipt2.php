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

if(isset($_GET['id'])){
     $ticketID = $_GET['id'];
     $stmt = $conn->prepare("SELECT * FROM post WHERE id = :id");
     $stmt->bindParam(":id", $ticketID);
     $stmt->execute();
     $ticket = $stmt->fetch(PDO::FETCH_BOTH);
}


?>
<!-- <script>console.log($id); </script> -->

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
              <a class="nav-link" href="logout.php"><i class="fa fa-user"></i> Logout</a>
            </li>
          </ul>

         
        </nav>

        <main class="col-sm-6 ml-sm-auto col-md-12 pt-3" role="main">
          <center><h1 style="font-family: Papyrus">TICKET</h1></center>
          <section>
            <div>
                   <table width="300" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="white" class="entryTable">
    

<tr>

  <th style="padding: 10px;"><center><?php echo $ticket['name'] ?></center></th>
</tr>
<tr>
  <td style="padding: 10px;"><i><center><i class="fa fa-home">:</i><?php echo $ticket['host'] ?></i></center></td>
</tr>
<tr>
  
  <td style="padding: 10px;"><center><i class="fa fa-pencil">:</i><?php echo $ticket['description'] ?></center></td>
</tr>

<tr>
  <td style="padding: 10px;"><center><i class="fa fa-money">:</i><?php echo $ticket['ticket'] ?></center></td>
</tr>


<tr>
  <td style="padding: 10px;"><center><i class="fa fa-archive">:</i>Quantity </td>
</tr>

<tr>
  <td style="padding: 10px;"><center><p><a class="btn btn-success" href="receipts.php?id=<?php echo $result['id'] ?>" name="submit" role="button">Make Payment&raquo;</a></p></center></td>
</tr>


  </table>
                </div>

      
          
          

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