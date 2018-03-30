<?php 
include 'database.php';
session_start();
$id = $_SESSION['id'];
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

</head>
<body>
 
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

</body>
</html>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../../../assets/js/ie10-viewport-bug-workaround.js"></script>