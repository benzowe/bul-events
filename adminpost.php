<?php 
include 'database.php';
session_start();
$id = $_SESSION['id'];
?>




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

 

   <link href="styles/font awesome/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
 
  </head>

  <body>
   <nav class="navbar is-primary is-fixed">
    <h1 class="title is-1" style="color:white">ADMINISTRATOR</h1>
     
   </nav>
<div class="block">
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

  

        
          <form action="" method="post" enctype="multipart/form-data">
          <section class="row text-center placeholders">
            <div class="col-6 col-sm-3 placeholder">
                                <?php 
            if (isset($_POST['submit']) && $statement) 
            { ?>
              <blockquote><?php echo $_POST['name']; ?> Has Been Successfully Posted!</blockquote>
            <?php 
            } ?>
              
              <label class="label" for="MatricNumber">Name</label>
              <input type="text" class="input" name="MatricNumber" value="admin">
              <label class="label" for="name">Event Name</label>
              <input type="text" class="input" name="name">
              <label class="label" for="description">Event Description</label>
              <textarea name="description" class="textarea" id="description" cols="100" rows="5"></textarea>
              <label class="label" for="ticket">Ticket Price</label>
              <input type="text" class="input" name="ticket" placeholder="(In Naira)"><br>
              <label class="label" for="flyer">Event Banner</label>
              <input type="file" class="input" name="banner"><br>
              <label class="label" for="host">Event Host</label><br>
              <input type="text" class="input" name="host"><br>
              <label for="date" class="label">Date</label><br>   
              <input type="date" name="date" class="input is-date"><br><br>  
              <center><input type="submit"  class="button is-primary" name="submit" value="Submit"></center>

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
