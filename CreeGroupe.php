
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>TP4</title>
</head>
<?php
        include_once  "navbarre.php";
        ?>
<body>

    <form method="POST" enctype="multipart/form-data">
  <div class="form-row">
    
    <div class="form-group col-md-6">
      <label for="inputnom">nom</label>
      <input type="text" class="form-control" name="name" placeholder="name">
    </div>
    <?php 
     try {

      $user="id16680291_lamine";
      $pass="rZ>&7!#2c@tyS6eM";


      $dburl = "mysql:host=localhost;port=3306;charset=utf8;dbname=id16680291_mjid";
   
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $connect = new PDO($dburl, $user,$pass, $pdo_options);

       
     } catch (Exception $e) {
       echo "ERREUR DE CONNECTION.."."  ".$e->getLine();
     }
    if($_SERVER['REQUEST_METHOD']){

        if(!empty($_POST['name'])){

             $name=htmlspecialchars($_POST['name']);
             

             $donnee=$connect->prepare('INSERT INTO groupecontact(nomG)VALUES(:name)');

  
             $donnee->execute(array('name'=>$name));

             echo 'le contacte a ete bien ajouter';

//              $donnee=$connect->query('SELECT * FROM donnee');
            
//              echo "<table class='table'>
//   <thead class='thead-dark'>
//     <tr>
//        <th scope='col'>ID</th>
//       <th scope='col'>nom</th>
//       <th scope='col'>prenom</th>
//       <th scope='col'>telephone1</th>
//       <th scope='col'>telephone2</th>
//       <th scope='col'>address</th>
//       <th scope='col'>email1</th>
//       <th scope='col'>email2</th>
//     </tr>
//   <tbody>";
//        while ($ligne=$donnee->fetch()) {
//          # code...
//         echo" <tr>
//       <th scope='row'></th>
//       <td>".$ligne['ID']."</td>
//        <td>".$ligne['nom']."</td>
//       <td>".$ligne['prenom']."</td>
//       <td>".$ligne['telephone1']."</td>
//       <td>".$ligne['telephone2']."</td>
//       <td>".$ligne['address']."</td>
//       <td>".$ligne['email1']."</td>
//       <td>".$ligne['email2']."</td>
//     </tr> </tbody>";
//        }
   
// echo"</table>";
             
 }
}
     
     $donnee=$connect->query('SELECT * FROM groupecontact');
        echo "<table class='table'>
  <thead class='thead-dark'>
    <tr>
       <th scope='col'>ID</th>
       <th scope='col'>Nom de Groupe</th>
       <th scope='col'>ADD contact</th>
              <th scope='col'>affichage groupe</th>
              <th scope='col'>Supprimer groupe</th>

    </tr>
  <tbody>";

       while ($ligne=$donnee->fetch()) {
         # code...
        echo" <tr>
      <th scope='row'>".$ligne['IDG']."</td>
       <td>".$ligne['nomG']."</td>

      <td> <button type='submit' class='btn btn-success '><a href='insertion.php?ajouter=".$ligne['IDG']."'>ajouter des contact</a></button></td>
      <td> <button type='submit' class='btn btn-success'><a href='AfficheG.php?afficher=".$ligne['IDG']."'>afficher groupe</a></button></td>
      <td> <button type='submit' class='btn btn-danger'><a href='DELETEGLOBAL.php?supprimer=".$ligne['IDG']."'>Supprimer</a></button></td>
      
    </tr> </tbody>";
       }
   
echo"</table>";
             


     //    }else{
     //      echo "ERREURRRR...";
     //    }


     // }else{
     //      echo "ERREUR...";
     // }
     
       





?>

     
       









