<?php

include "connects_db.php";
include "includes/header.php";
// select all data from database;
$sql = "SELECT destination.*, 
               region.nom_region,
               tourguide.nom_complete_tourguide,
               tourguide.email_tourguide,
               tourguide.telephone
               FROM destination 
               JOIN region ON destination.id_region = region.id_region
               JOIN tourguide ON destination.id_tourguide = tourguide.id_tourguide
               ";

// storage data in $getallData variable;
    $getallData = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>





<h1>destinations</h1>
<div class="destinations">
    

  <?php foreach($getallData as $allData){?>
       <div  class="destination" >

          <h3><?= $allData['nom_destination'] ?></h3>
          <p><?= $allData['description_destination'] ?></p>
          <img src=" upload/<?=$allData['image']?>?>">
   
          <h2>tourguide</h2>

          <h3>
            <?= $allData['nom_complete_tourguide'] ?>
          </h3>
             
          <h3>
              <?= $allData['email_tourguide'] ?>
          </h3>

           <h3>
              <?= $allData['telephone'] ?>
          </h3>




       </div>

<?php }?>















</div>

<?php include "includes/footer.php"?>