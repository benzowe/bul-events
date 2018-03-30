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



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recipts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  </head>
  <body>
    <nav class="navbar is-danger" role="navigation" aria-label="main navigation">
      
<strong><p style="font-family: Herculanum;color: white;padding:15px">BU EVENTS</p></strong>

      
        
<p style="padding: 15px"><i style="padding: 2px" class="fas fa-user"></i>  Logged in as:<?php $a = showFirstName($conn, $id); echo $a?></p>
    </nav>
  <section class="section">
    <div class="container">
      <center>
      <h1 class="title">
        RECEIPTS
      </h1>
    </center>



    <center>
    <table border="1" style="border-radius: 10px;box-sizing: border-box;"> 
<th>
  
</th>
      <tr>
          <td>
          <center><label for="" class="label" >Event Name</label></center>
           <center> <p style="padding: 40px"><?php echo $ticket['name'] ?></p></center>
          </td>        
      </tr>

      <tr>
        <td>
          <center><label for="" class="label">Event Host</label></center>
          <center><p style="padding: 40px"><?php echo $ticket['host'] ?></p></center>
        </td>
      </tr>

      <tr>
        <td>
          <center><label for="" class="label">Ticket Price</label></center>
         <center> <p style="padding: 40px"><strong>N</strong><?php echo $ticket['ticket'] ?></p></center>
        </td>
      </tr>

        <tr>
          <td>
            <center><label for="" class="label">Quantity</label></center>
            <center><p style="padding: 40px"><?php echo($quantity); ?></p></center>
          </td>
        </tr>

        <tr>
          <td>
            <label for="" class="label is-primary">TOTAL</label>
            <center><p><strong>N</strong><?php echo $total; ?></p></center>
          </td>
        </tr>

    </table><br><br>
    <a href="#" class="button is-primary" style="border-radius: 10px" onclick="validate()">Print Receipt</a>
    <a href="home.php" class="button is-danger" style="border-radius: 10px">Cancel</a>
    </center> 
    </div>
  </section>
  <script>
    
    function validate(){
alert('Your Ticket Has Been Successfully Processed');
    window.location.href = "home.php";
    }
  </script>
  </body>
</html>