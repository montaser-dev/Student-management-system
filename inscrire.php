  <!-- ********************************************* le code php ********************************************************** -->
  <?php 
  require('connect.php');
  if(!isset($_GET['CNE'])){
    header("location:valider.php");
  }
  $etudiant ="select * from etudiant where cne ='". $_GET['CNE']."'";
  $query = mysqli_query($con, $etudiant);
  $data = mysqli_fetch_assoc($query);
  $cne = $data['cne'];
  $nom = $data['nom'];
  $prenom = $data['prenom'];
  $code_etd = $data['code_etd'];


  $province ="select * from province";
  $query2 = mysqli_query($con, $province);

  $bac ="select * from bac";
  $query3 = mysqli_query($con, $bac);

  $etablissement ="select * from etablissement";
  $query4 = mysqli_query($con, $etablissement);

  if(isset($_POST["sinscrire"])){
    // Taking all  values from the form data(input)
    $first_name =  $_REQUEST['Nom'];
    $last_name = $_REQUEST['Prenom'];
    $CIN =  $_REQUEST['CIN'];
    $VilleNaissance = $_REQUEST['VilleNaissance'];
    $Adresse = $_REQUEST['Adresse'];
    $Tel = $_REQUEST['Tel'];
    $sexe = $_REQUEST['Sexe'];
    $date_naissance = $_REQUEST['DateNaissance'];
    $Situation_Familiale = $_REQUEST['SituationFamiliale'];
    $Annee = $_REQUEST['Annee'];
    $SerieBac = $_REQUEST['SerieBac'];
    $code_province = $_REQUEST['Province'];
    /* <!-- ********************************************* UPDATE ETUDIANT ********************************************************** --> */
    $updateEtudiant = "UPDATE etudiant SET nom ='$first_name',code_province='$code_province', prenom = '$last_name',sexe='$sexe', date_naissance = '$date_naissance' ,situation_familiale = '$Situation_Familiale',adresse= '$Adresse' ,tel= '$Tel' , ville_naissance = '$VilleNaissance'  , cin = '$CIN' WHERE cne='$cne'";
    $query5 = mysqli_query($con, $updateEtudiant );
    /* <!-- ********************************************* UPDATE  BAC ETUDIANT********************************************************** --> */
    $updateBacEtudiant = "UPDATE `bac_etd` SET `annee_obt_bac`='$Annee' WHERE `code_bac_etd` = '$code_etd'";
    $query6 = mysqli_query($con, $updateBacEtudiant);
    /* <!-- ********************************************* UPDATE  BAC********************************************************** --> */
    $updateBac= "UPDATE `bac` SET `lib_bac`='$Annee' WHERE `code_bac` = '$code_etd'";
    $query7 = mysqli_query($con, $updateBac);
    if($query5 && $query6 && $query7){
        echo "data stored in a database successfully ! "."<br>"."<br>";
        echo "<a href=''>Back to Forme Inscrire </a>" ;
        exit();
    } else{
        echo "ERROR: Hush! Sorry . ". mysqli_error($con);
    }
  }

?>
  <!-- ********************************************* le code html ********************************************************** -->
<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="inscrire.css">
    <link rel="shortcut icon" href="img/icon1.png" >
    <title>Inscription</title>
    </head>
    <body class="container">
  <!-- ********************************************* Etudiant ********************************************************** -->
  <form class="row g-3 m-5" action="" method="POST">
  <div class="row mb-3">
    <div class="col-sm-7">
    <div class="alert alert-primary" role="alert">
    Etudiant
</div>
  </div>
  </div>
<div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">CNE</label> 
    <div class="col-sm-5">
      <input type="text" disabled class="form-control" id="inputEmail3" name="CNE" value="<?php echo $cne?>"><!-- here CNE-->
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Nom et Prenom</label>
    <div class="col-sm-5">
      <input type="text" disabled class="form-control"  id="inputEmail3" name="NomPrenom" value="<?php echo $nom ." " . $prenom ?>"><!-- here NomPrenom-->
    </div>
  </div>

 <!-- ********************************************* Etat Civil ********************************************************** -->
  <div class="row mb-3">
    <div class="col-sm-7">
    <div class="alert alert-secondary" role="alert">
    Etat Civil
</div>
  </div>
  </div>

<div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Nom</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required  id="inputEmail3" name="Nom" value="<?php echo $nom ?>"><!-- here Nom--> 
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Prenom</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="inputEmail3" required  name="Prenom"  value="<?php echo $prenom?>"><!-- here Prenom-->
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">CIN</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required id="inputEmail3" name="CIN"><!-- here CIN-->
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">CNE</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required name="CNEAjoute" disabled value="<?php echo $cne?>"> <!--here CNEAjoute-->
    </div>
  </div>
  

  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Sexe</label>
    <div class="col-sm-5">
    <select class="form-select" id="inlineFormSelectPref" name="Sexe"> <!-- here Sexe-->
      <option value="Mas">M</option>
      <option value="Fem">F</option> 
      <?php ?>
    </select>    
  </div>
  </div>

  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Situation Familiale</label>
    <div class="col-sm-5">
    <select class="form-select" id="inlineFormSelectPref" name="SituationFamiliale"><!-- here SituationFamiliale-->
      <option value="Celebataire">Celebataire</option>
      <option value="Marié">Marié</option>
      <option value="Divorsé">Divorsé</option>
    </select>    
  </div>
  </div>
 <!-- ********************************************* Naissance ********************************************************** -->
  <div class="row mb-3">
    <div class="col-sm-7">
    <div class="alert alert-success" role="alert">
    Naissance
</div>
  </div>
  </div>

      <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Date Naissance</label>
    <div class="col-sm-5">
      <input type="date" class="form-control" id="inputEmail3" required name="DateNaissance"><!-- here DateNaissance-->
    </div>
  </div>
      <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Ville Naissance</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required id="inputEmail3" name="VilleNaissance"><!-- here VilleNaissance-->
    </div>
  </div>

 <!-- ********************************************* Adresse ********************************************************** -->
  <div class="row mb-3">
    <div class="col-sm-7">
    <div class="alert alert-info" role="alert">
      Adresse
</div>
  </div>
  </div>

      <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Adresse</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required id="inputEmail3" name="Adresse"><!-- here Adresse-->
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Province</label>
    <div class="col-sm-5">
    <select class="form-select" id="inlineFormSelectPref" required name="Province"><!-- here Province-->
    <?php 
    while($province = mysqli_fetch_assoc($query2)){
      echo "<option value=".$province['code_province'].">".$province['lib_province']."</option>";
    }
    ?>
    </select>    
  </div>
  </div>

  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Tél</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required id="inputEmail3" name="Tel"><!-- here Tel-->
    </div>
  </div>
 <!-- ********************************************* Bac ********************************************************** -->


<div class="row mb-3">
    <div class="col-sm-7">
    <div class="alert alert-dark" role="alert">
      Bac
</div>
  </div>
  </div>

      <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Série Bac</label>
    <div class="col-sm-5">
    <select class="form-select" id="inlineFormSelectPref" name="SerieBac"><!-- here SerieBac-->
    <?php 
    while($bac = mysqli_fetch_assoc($query3)){
      echo "<option>".$bac['lib_bac']."</option>";
    }
    ?>
    </select>    
  </div>
  </div>

  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Mention</label>
    <div class="col-sm-5">
    <select class="form-select" id="inlineFormSelectPref" name="Mention"><!-- here Mention-->
      <option value="1">Passable</option>
      <option value="2">Assez Bien</option>
      <option value="3">Bien</option>
      <option value="4">Tres Bien</option>
    </select>    
  </div>
  </div>

  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Année</label>
    <div class="col-sm-5">
    <select class="form-select" id="inlineFormSelectPref" name="Annee"><!-- here Annee-->
      <option value="2010-07-05">2010</option>
      <option value="2011-07-05">2011</option>
      <option value="2012-07-05">2012</option>
      <option value="2013-07-05">2013</option>
      <option value="2014-07-05">2014</option>
      <option value="2015-07-05">2015</option>
      <option value="2016-07-05">2016</option>
      <option value="2017-07-05">2017</option>
      <option value="2018-07-05">2018</option>
      <option value="2019-07-05">2019</option>
      <option value="2020-07-05">2020</option>
      <option value="2021-07-05">2021</option>
    </select>    
  </div>
  </div>

  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Etablissement</label>
    <div class="col-sm-5">
    <select class="form-select" id="inlineFormSelectPref" name="Etablissement"><!-- here Etablissement-->
    <?php 
    while($etablissement = mysqli_fetch_assoc($query4)){
      echo "<option>".$etablissement['lib_etb']."</option>";
    }
    ?>
    </select>    
  </div>
  </div>
 <!-- ********************************************* Button ********************************************************** -->
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Toutes les informations ont introduites 
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit" name="sinscrire">S'inscrire</button>
  </div>

</form>
   <!-- ****************************************************** fichier JavaScript********************************************************* -->
    <script src="main.js"></script>
      </body>
</html>


