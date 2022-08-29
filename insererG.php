
<?php
        include_once  "navbarre.php";
        ?>
<?php 
$idC=$_GET['id'];
$idG=$_GET['idG'];

try {

       $user="id16680291_lamine";
      $pass="rZ>&7!#2c@tyS6eM";


      $dburl = "mysql:host=localhost;port=3306;charset=utf8;dbname=id16680291_mjid";
   
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $connect = new PDO($dburl, $user,$pass, $pdo_options);


       
     } catch (Exception $e) {
       echo "ERREUR DE CONNECTION.."."  ".$e->getLine();
     }try {

      
      
   $donnee=$connect->prepare('INSERT INTO addgroupe(id_group, id_contact) VALUES (:idG, :idC)');
            $donnee->execute(array(
                'idC' => $idC,
                'idG' => $idG
            ));
           
            echo ("Contact ajouté au groupe"); 
}

 catch (Exception $ex) {
    
            echo ("Opération non éffectuée à cause d'une erreur");
        }
        



?>




</body>
</html>