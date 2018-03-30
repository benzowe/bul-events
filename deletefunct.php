<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    
</head>
<body>
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

    <div class="modal is-active">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title"><i class="fas fa-trash"></i> Delete Event</p>
            <a href="deleteevent.php"><button class="delete" aria-label="close"></button></a>
        </header>
        <section class="modal-card-body">
            Are You sure you want to delete this event?
        </section>
        <footer class="modal-card-foot">
            <a href="deletefunct2.php?id=<?php echo $result['id'];?>"><button class="button is-danger" onclick="return validate()">Delete</button></a>

            <a href="adminhome.php"><button class="button is-info">Cancel</button></a>
        </footer>
    </div>        
    </div>
           <?php 
            }
             ?>

             <script>
                 function validate(){
                    alert("Event Has Been Successfully Deleted!")
                 }
             </script>
</body>
</html>