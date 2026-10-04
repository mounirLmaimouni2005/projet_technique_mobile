<?php
   include "connects_db.php";


   //get region from database;
    $region = $pdo->query("SELECT * FROM region")->fetchAll(PDO::FETCH_ASSOC);
     
    if($_SERVER['REQUEST_METHOD'] === "POST"){

    // chekc if emlentisset
        $nom_destination = isset($_POST['nom_destination']) ? trim($_POST['nom_destination']) : "";
        $description = isset($_POST['description']) ? trim($_POST['description']) : "";
        $image = isset($_FILES['image']) ? $_FILES['image']['name'] :"";
        $region = isset($_POST['id_region']) ? trim($_POST['id_region']) : "";



    // check if elment not empty;
    if($nom_destination !="" && $description !="" && $image !="" && $region !=""){
  
    //add image to folder upload;
      $image_tmp = $_FILES['image']['tmp_name'];
      move_uploaded_file($image_tmp , "upload/" . $image);

   //add all data to database;
       $sql = "INSERT INTO destination
                 (nom_destination,description_destination ,image,id_tourguide,id_region)
                 VALUE(?,?,?,?,?)";
       $allData = $pdo->prepare($sql);
       $allData->execute([
           $nom_destination,
           $description,
           $image,
           1,
           $region
       ]);



 header("location:add.php");
exit;






    }else{echo 'you have a mistack';}
        
    
   
    }

include "includes/header.php";

?>







 <main>

        <form action="" method="POST" enctype="multipart/form-data">

            <label for="nom_destination">Nom de destination</label>
            <input type="text" name="nom_destination" id="nom_destination" required>

            <br>

            <label for="description">description de destination</label>
            <textarea name="description" id="description"></textarea>

            <br>

            <label for="image"> image</label>
            <input type="file" name="image" id="image">

            <br>

                <label for="region">region</label>

                <select name="id_region">
                    <option value="">select region</option>
                        <?php foreach($region as $regs){?>

                        <option value="<?=$regs['id_region']?>">
                            <?= $regs['nom_region']?>
                        </option>
                        
                        <?php } ?>
                        
                </select>
        <br>

                <button type="submit">Add destination</button>
        </form>

</main>
<?php include "includes/footer.php"?>