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

     
  <link href="styles/font awesome/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  

  </head>

  <body>
   <!-- 
      <a class="navbar-brand" style="font-family: Herculanum" href="home.php">BU Events</a> -->

      <div class="block">
    <nav class="navbar is-primary is-fixed">
  <h1 class="title is-1" style="color:white">ADMINISTRATOR</h1></nav>
  <aside class="menu">
    <p class="menu-label">
      VIEWS
    </p>
    <ul class="menu-list">
      <li><a href="adminview.php"><i class="fas fa-eye"></i> View Events</a></li>
      <a href="viewcomplaints.php"><i class="fas fa-search"></i> View Enquiries</a>
    </ul>
    <p class="menu-label">
      EDITS
    </p>
    <ul class="menu-list">
      <li>
      
        <ul>
          <li>
          
            <a href="adminpost.php"><i class="fas fa-spinner fa-spin"></i> Post Events</a>
            <a href="deleteevent.php"><i class="fas fa-trash"> </i> Delete Events</a>
            <a href="adminregister.php"><i class="fas fa-plus"></i> Add A User</a>
            <a href="login.php"><i class="fas fa-user"></i> Logout</a>
          </li>
        </ul>
      </li>
    </ul>
  </aside>
</div>
    

        <main class="col-sm-6 ml-sm-auto col-md-12 pt-3" role="main">
          <center><h1 style="font-family: Papyrus">TICKET</h1></center>
          <section>
            <div>
              <form action="receipts.php" method="post">
                   <table width="300" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="white" class="entryTable">
    
<tr>
  <td colspan="" rowspan="" headers="" style="padding: 40px;"><center> <img src="<?php echo $ticket["banner"]?>" alt="" height="100" width="100"> </center></td>
</tr>
<tr>

  <th style="padding: 10px;"><center><?php echo $ticket['name'] ?></center></th>
</tr>
<tr>
  <td style="padding: 10px;"><i><center><i class="fas fa-home"></i><?php echo $ticket['host'] ?></i></center></td>
</tr>
<tr>
  
  <td style="padding: 10px;"><center><i class="fas fa-spinner fa-spin"></i><?php echo $ticket['description'] ?></center></td>
</tr>

<tr>
  <td style="padding: 10px;"><center><i class="fa fa-dollar-sign"></i><?php echo $ticket['ticket'] ?></center></td>
</tr>


<tr>
  <td style="padding: 10px;"><center><i class="fas fa-archive"></i>Quantity <input type="text" name="quantity" size="5" style="border-radius: 10px; background-color: black; color: white;"></td>
</tr>

<tr>
  <td style="padding: 10px;"><center><p><a class="button is-success" href="receipts.php"<?php echo $ticket['id'] ?> name="submit" role="button">Make Payment&raquo;</a></p></center></td>
</tr>


  </table>
  </form>
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