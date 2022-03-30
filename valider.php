<?php 
  require('connect.php');
  /********************************************* Check if CNE exist*****************************************************/
  if (isset($_POST['valider'])) {
      $cne = $_POST['CNE'];
      $sql = "SELECT cne FROM etudiant WHERE CNE='".$cne."'";
      $res = mysqli_query($con, $sql);
      if(mysqli_num_rows($res) > 0){
        header("Location:inscrire.php?CNE=".$cne);  
      }else{
        header("Location: error.php");
      }
    }
  ?>
  <!-- ********************************************* le code html ********************************************************** -->
  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./style.css">
    <link rel="shortcut icon" href="img/icon1.png" >
    <title>Validation</title>
  </head>
  <body>

  <form action="" method="POST">
    <div class="container">
      <h1>Page Validation</h1>
      <form action="" method="POST">
        <div class="form-control">
          <input type="text" required name="CNE"/> <!-- CNE-->
          <label>Entrer Votre CNE</label>
        </div>
      <button class="btn" name="valider">Valider </button>
        <p class="text">Vous n'avez pas de compte? <a href="addAcount.php">Ajouter Compte</a></p>
      </form>
    </div>
    <script src="script.js"></script>
  </body>
</html>