

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

<style type="text/css">
	.picture{
		padding-left: 1100px;
    padding-bottom: 50px;
		display: flex;


	}	
	.pic2{
		padding-left: 50px;
	}

    .barre{
    	padding-left: 140px;
    }
    .photoH{
    	
    	padding-bottom: 0px;
      padding-right: 20px;
    }
    .pic1{
        padding-right:20px;
    }
    p{
       padding-right:40px;
    }

	 a{
	

    text-decoration: none;
    color: white;
  }
</style>
<body>
      <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <h1>Bienvenue sur mon contact !</h1>
                </div>
            </div>
        </div>
  
        
<form method="POST" action="search.php">
	<div class="barre">
    
<div class="input-group m-5 w-75">
	
  <input type="search" class="form-control rounded" name="search" placeholder="Search" aria-label="Search"
    aria-describedby="search-addon" />
  <!-- <button type="button" class="btn btn-outline-primary"><a href="affichage.php"> search</a></button> -->
</div>
</div>


</form>

   
   <div class="picture">
   	     <div class="pic1">
   	   <a href="TP.php" target="_blank"><img src="images/CONTACT.png" width="40px" height="40px"></a>
   	   <br>
         <p>ADD</p>
   	   </div>
   	  
   	    <div class="pic2">
   	   <a href="CreeGroupe.php" target="_blank"><img src="images/group.png" width="40px" height="40px"></a>
   	    <p>Groupes</p>
        </div>
       
   </div>

   
</div>
</form>
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
       <th scope='col'>ID</th>
       <th scope='col'>image</th>
      <th scope='col'>nom</th>
      <th scope='col'>prenom</th>
      <th scope='col'>telephone1</th>
      <th scope='col'>telephone2</th>
      <th scope='col'>address</th>
      <th scope='col'>email1</th>
      <th scope='col'>email2</th>
      <th scope='col'>genre</th>
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
       <td>".$ligne['genre']."</td>
      <td> <button type='submit' class='btn btn-danger'><a href='delete.php?delete=".$ligne['ID']."'>Delete</a></button></td>
      <td> <button type='submit' class='btn btn-success'><a href='Modifier.php?Update=".$ligne['ID']."'>Update</a></button></td>
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


</body>
</html>