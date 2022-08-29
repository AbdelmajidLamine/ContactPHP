
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des membres du groupe  </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<?php
        include_once  "navbarre.php";
        ?>
<body>
<?php


$idG=$_GET['afficher'];
try {

   try {

      $user="id16680291_lamine";
      $pass="rZ>&7!#2c@tyS6eM";


      $dburl = "mysql:host=localhost;port=3306;charset=utf8;dbname=id16680291_mjid";
   
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $connect = new PDO($dburl, $user,$pass, $pdo_options);


       
     } catch (Exception $e) {
       echo "ERREUR DE CONNECTION.."."  ".$e->getLine();
     }
    $stm = $connect->prepare('SELECT id_contact from addgroupe where id_group=:idG');
    $stm->execute(array(
        'idG' => $idG
    ));  

    $com = 0;

    $table = '<div class="container">';
    $table .= '<table class="table">
  <thead class="thead-dark">';
    $table .= '<tr><td>ID</td><td>NOM</td><td>PRENOM</td><td>TELEPHONE PERS.</td><td>TELEPHONE PRO.</td><td>ADRESSE</td><td>EMAIL PERS.</td><td>EMAIL PRO.</td><td>GENRE</td><td>ACTIONS</td></tr>';
    while ($dat = $stm->fetch()) {

       $id=$dat['id_contact'];
       $com ++;

        $stmt = $connect->prepare('select * from donnee where ID=:id');
       $stmt->execute(array(
        'id' => $id

    )); 
   

    
    while ($data = $stmt->fetch()) {

        $linkDel = '<a role="button" class="btn btn-danger mb-1 btn-sm" href="deleteG.php?id=' . $data['ID'] . '&idG=' .$idG .'"> Supprimer </a>';

        $table .= '<tr><td>' . $data['ID'] . '</td><td>' . $data['nom'] . '</td><td>' . $data['prenom']  . '</td></td><td>' . $data['telephone1']. '</td><td>' . $data['telephone2']. '</td><td>' . $data['address']. '</td><td>' . $data['email1']. '</td><td>' . $data['email2']. '</td><td>' . $data['genre'].'</td><td>' . $linkDel .'</td></tr>';
        
    }
 }
 $table .= '</table></div>';

    if ($com != 0) {
        echo '<hr>';
        echo ("Nombre de contacts dans ce groupe :  $com");
        echo $table;
    } else {
        echo '<hr>';
        echo ("Il n y a actuellement aucun contact enregistré");
    }

} catch (Exception $ex) {

    echo ('La liste des contacts du groupe ne peut pas s\'afficher à cause d\'une erreur ');
}

?>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>