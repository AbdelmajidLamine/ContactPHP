
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>TP4</title>
</head>
<style type="text/css">
  p{
    color: red;
  }

</style>
<?php
        include_once  "navbarre.php";
        ?>

<body>
    <form method="POST" enctype="multipart/form-data">
  <div class="form-row">
    
    <div class="form-group col-md-6">
      <label for="inputnom">nom</label>
      <input type="text" class="form-control" name="nom" placeholder="nom">
      <?php 
       if(empty($_POST['nom'])) { 
  
      echo "<p>Remplire ce champs!!</p>";
     }
    
      ?>
    </div>
    <br>
    <div class="form-group col-md-6">
      <label for="inputprenom">prenom</label>
      <input type="text" class="form-control" name="prenom" placeholder="prenom">
      <?php 
       if(empty($_POST['prenom'])) { 
  
      echo "<p>Remplire ce champs!!</p>";
     }
    
      ?>
    </div>
   <br>
     <div class="form-group col-md-6">
    <label for="inputtelephone1">telephone1</label>
    <input type="text" class="form-control" name="telephone1" placeholder="">
    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
 $telephone1=htmlspecialchars($_POST['telephone1']);
 if(!preg_match("#^[67][0-9]{8}$#", $telephone1)){
 
   echo "<p>Remplire ce champs 0(67)******!!</p>!";
} 
} 
    ?>
    </div>
    <br>
  <div class="form-group col-md-6">
    <label for="inputtelephone2">telephone2</label>
    <input type="text" class="form-control" name="telephone2" placeholder="">
     <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
 $telephone2=htmlspecialchars($_POST['telephone2']);
 if(!preg_match("#^[67][0-9]{8}$#", $telephone2)){
 
   echo "<p>Remplire ce champs 0(67)******!!</p>";
} 
} 
    ?>
  </div>
  </div>
  <br>
  <div class="form-group col-md-6">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" name="address" placeholder="1234 Main St">
    <?php 
       if(empty($_POST['address'])) { 
  
      echo "<p>Remplire ce champs!!</p>";
     }
    
      ?>
  </div>
  <br>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email personnel</label>
      <input type="email" class="form-control" name="email1" placeholder="Email personnel">
      <?php if(!empty($_POST['email1'])) { 
      if(!filter_var($_POST['email1'],FILTER_VALIDATE_EMAIL)){
        echo "<p>Remplire ce champs ******@***.***!!</p>";
      }
          
    }else{
      echo "<p>Remplire ce champs!!</p>";
     }
     ?>
    </div>
    <br>
     <div class="form-group col-md-6">
      <label for="inputEmail4">Email professionnel</label>
      <input type="email" class="form-control" name="email2" placeholder="Email professionnel">
      <?php if(!empty($_POST['email2'])) { 
      if(!filter_var($_POST['email2'],FILTER_VALIDATE_EMAIL)){
        echo "<p>Remplire ce champs ******@***.***!!</p>";
      }
          
    }else{
      echo "<p>Remplire ce champs!!</p>";
     }
     ?>

    </div>
    </div>
    <br>

    <label for="photo">photo</label>
      <input type="file" name="photo">
      <br>
      <br>
    Genre
    <br>
    <div class="form-check form-check-inline">
      
  <input class="form-check-input" name="ch[]" type="checkbox" id="inlineCheckbox1" value="male">
  <label class="form-check-label" for="inlineCheckbox1">male</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="ch[]" type="checkbox" id="inlineCheckbox2" value="female">
  <label class="form-check-label" for="inlineCheckbox2">female</label>
</div>
  <br>
  <br>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
</body>
</html>




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

        if(!empty($_POST['nom'])&& !empty($_POST['prenom'])&& !empty($_POST['telephone1'])&& !empty($_POST['telephone2'])&& !empty($_POST['address'])&& !empty($_POST['email1'])&& !empty($_POST['email2'])&& !empty($_POST['ch'])){

             $nom=htmlspecialchars($_POST['nom']);
             $prenom=htmlspecialchars($_POST['prenom']);
              $telephone1=htmlspecialchars($_POST['telephone1']);
              $telephone2=htmlspecialchars($_POST['telephone2']);
              $address=htmlspecialchars($_POST['address']);
               $email1=htmlspecialchars($_POST['email1']);
                $email2=htmlspecialchars($_POST['email2']);
                $ch=$_POST['ch'];
                $image=$_FILES["photo"]["name"];
                $tmp_image=$_FILES["photo"]["tmp_name"];
                move_uploaded_file($tmp_image, "images/$image");
                $ch1="";
                foreach ($ch as $value) {
               # code...
               $ch1.=$value;
                   }
                 

 
  

             $donnee=$connect->prepare('INSERT INTO donnee(nom,prenom,telephone1,telephone2,address,email1,email2,image,genre)VALUES(:nom,:prenom,:telephone1,:telephone2,:address,:email1,:email2,:image,:ch1)');

             
            

             $donnee->execute(array('nom'=>$nom,'prenom'=>$prenom,'telephone1'=>$telephone1,'telephone2'=>$telephone2,'address'=>$address,'email1'=>$email1,'email2'=>$email2,'image'=>$image,'ch1'=>$ch1));

             echo 'le contacte a ete bien ajouter<br>';
              echo "<button type='submit' class='btn btn-primary'> <a href='affichage.php'>precedent</a></button>";

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
       









 ?>


 








