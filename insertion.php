


    

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
      <label for="inputnom">nom de groupe</label>
      <input type="text" class="form-control" name="nom" placeholder="nom de groupe">
    </div>
    <br>
    <label for="photo">photo</label>
      <input type="file" name="photo">


   <br>
   <br>



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



             $donnee=$connect->query('SELECT * FROM donnee');
            
             echo "<table class='table'>
  <thead class='thead-dark'>
    <tr>
       
       <th scope='col'>image</th>
      <th scope='col'>nom</th>
      <th scope='col'>prenom</th>
      <th scope='col'>telephone1</th>
      <th scope='col'>telephone2</th>
      <th scope='col'>address</th>
      <th scope='col'>email1</th>
      <th scope='col'>email2</th>
      <th scope='col'>genre</th>
      <th scope='col'>SELECT</th>
    </tr>
  <tbody>";

       while ($ligne=$donnee->fetch()) {
          $idG=$_GET['ajouter'];
         $linkDel = '<a role="button" class="btn btn-success mb-1 btn-sm" href="insererG.php?id=' . $ligne['ID'] .'&idG='.$idG.'"  > ADD </a>';
        echo" <tr>
      <th scope='row'><img src='images/".$ligne['image']."' width='40'> 
       <td>".$ligne['nom']."</td>
      <td>".$ligne['prenom']."</td>
      <td>".$ligne['telephone1']."</td>
      <td>".$ligne['telephone2']."</td>
      <td>".$ligne['address']."</td>
      <td>".$ligne['email1']."</td>
      <td>".$ligne['email2']."</td>
       <td>".$ligne['genre']."</td>
       <td> 
       ".$linkDel."</td>

    </tr> </tbody>";
       }
   
echo"</table><button class='btn btn-primary' type='submit'>Creer groupe</button>";
             


     //    }else{
     //      echo "ERREURRRR...";
     //    }


     // }else{
     //      echo "ERREUR...";
     // }
     



      if($_SERVER['REQUEST_METHOD']){

        if(!empty($_POST['nom'])&& !empty($_POST['sl'])){

             $nom=htmlspecialchars($_POST['nom']);
             
                $sl=$_POST['sl'];
                $image=$_FILES["photo"]["name"];
                $tmp_image=$_FILES["photo"]["tmp_name"];
                move_uploaded_file($tmp_image, "images/$image");
                $ch1="";
                foreach ($sl as $value) {
               # code...
               $ch1.=$value;
                   }

             $donnee=$connect->prepare('INSERT INTO groupe(nameg,selectiong,image)VALUES(:nom,:ch1,:image)');

             
            

             $donnee->execute(array('nom'=>$nom,'ch1'=>$ch1,'image'=>$image));

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
        // else{
        //   echo "ERREURRRR...";
        // }


     }




?>




</body>
</html>