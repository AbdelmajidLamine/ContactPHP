


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>TP</title>
</head>
<style type="text/css">
   a{
    text-decoration: none;
    color: white;
  }
</style>
<?php
        include_once  "navbarre.php";
        ?>

<body>


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

    
            $nom=htmlspecialchars($_POST['search']);
             $donnee=$connect->prepare('SELECT * FROM donnee WHERE nom=:nom OR telephone1=:nom OR telephone2=:nom');
             $donnee->execute(array('nom'=>$nom));
            
             echo "<table class='table'>
  <thead class='thead-dark'>
    <tr>
       <th scope='col'>ID</th>
       <th scope='col'>image</th>
      <th scope='col'>nom</th>
      <th scope='col'>prenom</th>
      <th scope='col'>telephone1</th>
      <th scope='col'>telephone2</th>
      <th scope='col'>address</th>
      <th scope='col'>email1</th>
      <th scope='col'>email2</th>
      <th scope='col'>Delete</th>
      <th scope='col'>Update</th>
    </tr>
  <tbody>";

       while ($ligne=$donnee->fetch()) {
         # code...
        echo" <tr>
      <th scope='row'>".$ligne['ID']."</td>
      <td> <img src='images/".$ligne['image']."' width='40'> </td>
       <td>".$ligne['nom']."</td>
      <td>".$ligne['prenom']."</td>
      <td>".$ligne['telephone1']."</td>
      <td>".$ligne['telephone2']."</td>
      <td>".$ligne['address']."</td>
      <td>".$ligne['email1']."</td>
      <td>".$ligne['email2']."</td>
      <td> <button type='submit' class='btn btn-danger'><a href='delete.php?delete=".$ligne['ID']."'>Delete</a></button></td>
      <td> <button type='submit' class='btn btn-success'><a href='Modifier.php?Update=".$ligne['ID']."'>Update</a></button></td>
    </tr> </tbody>";
       }
   
echo"</table>";

 //   }
 // }
    


     //    }else{
     //      echo "ERREURRRR...";
     //    }


     // }else{
     //      echo "ERREUR...";
     // }
     
       





?>


</body>
</html>