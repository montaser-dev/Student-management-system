  <!-- ********************************************* le code php ********************************************************** -->
  <?php 
  require('connect.php');

  if(isset($_POST["adding"])){
    // Taking all  values from the form data(input)
    $first_name =  $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];
    $CNE =  $_REQUEST['cne'];
    $insert_data = "INSERT INTO etudiant ( nom, prenom, cne) VALUES('$first_name', '$last_name', '$CNE')";
    $query = mysqli_query($con,$insert_data);
  }
?>
  <!-- ********************************************* le code php ********************************************************** -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./style.css" />
    <link rel="shortcut icon" href="img/icon1.png" >
    <title>Ajouter Nouveau Compte</title>
  </head>
  <body>
    <div class="container">
      <h1>Ajouter Etudiant</h1>
      <form action="" method="POST">
        <div class="form-control">
          <input type="text" required name="first_name"/> <!-- here first_name-->
          <label>Nom</label>
        </div>
        <div class="form-control">
          <input type="text" name="last_name" required /><!-- here lst_name-->
          <label>Prenom</label>
        </div>
        <div class="form-control">
          <input type="text" name="cne" required /><!-- here cne-->
          <label>CNE</label>
        </div>
      <button class="btn" name="adding">Ajouter </button>
      <a href="valider.php" class="btn">Valider</a>
      </form>
    </div>
    <script src="script.js"></script>
  </body>
</html>
