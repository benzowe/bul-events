<?php 
include 'database.php';

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

     
       <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
<!-- 
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->

    
    <style>
        a{  
          transition: .6s ease color;
          color: darkmagenta;
          
        }
    

    </style>
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
      <a href=""><i class="fas fa-search"></i> View Enquiries</a>
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
          

         <?php
      $db = new mysqli('localhost','mohammed', 'dollie', 'event');

      //execute the SQL query and return records
      // $check = $db->query("SELECT * FROM users WHERE id=$id")->fetch_assoc();
      // $MatricNumber = $check['MatricNumber'];
      $result = $db->query("SELECT * FROM post ");
      ?>
        <?php 

          foreach ($result as $result) {
           
          

         ?> 
         <table width="300" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="white" class="entryTable">
    
<tr>
  <td colspan="" rowspan="" headers="" style="padding: 40px;"><center> <img src="<?php echo $result ["banner"]?>" alt="" height="100" width="100"> </center></td>
</tr>
<tr>

  <th style="padding: 10px;"><center><b><?php echo $result['name'];?></b></center></th>
</tr>
<tr>
  <td style="padding: 10px;"><center><i class="fas fa-home"></i> <?php echo $result['host'];?></center></td>
</tr>
<tr>
  
  <td style="padding: 10px;"><center><i class="fas fa-spinner fa-spin"></i> <?php echo $result['description'];?></center></td>
</tr>

<tr>
  <td style="padding: 10px;"><center><i class="fas fa-dollar-sign"></i> <?php echo $result['ticket'];?></center></td>
</tr>

<tr>
  <td style="padding: 10px;"><center><i class="fas fa-clock"></i> <?php echo $result['date'];?></center></td>
</tr>

<tr>
  <td style="padding: 10px;"><center><p><a class="button is-danger" href="deletefunct.php?id=<?php echo $result['id'];?>" name="submit" role="button">Delete Event &raquo;</a></p></center></td>
</tr>


  </table>
        </div>

      
                       <?php 
            }
             ?>
          

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
