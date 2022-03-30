  <!-- ********************************************* le code php ********************************************************** -->
  <?php 
  require('connect.php');
?>
  <!-- ********************************************* le code php ********************************************************** -->
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./style.css" />
    <link rel="shortcut icon" href="img/icon1.png" >
    <title>Erreur</title>
    </head>
    <body>
    <div class="container">
        <h1>CNE Inexistant !</h1>
        <form action="valider.php" method="POST">
        <button class="btn" name="retour">Retour </button>
        </form>
    </div>
    <script src="script.js"></script>
    </body>
</html>
