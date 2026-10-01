
   
   <?php 
    

include 'connect_db.php';

$regions = $pdo->query("SELECT * FROM region")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
// check if element isset;

    $nom_destination = isset($_POST['nom_destination']) ? trim($_POST['nom_destination']) : "";
    $description_destination = isset($_POST['description_destination']) ? trim($_POST['description_destination']) : "";
    $id_region = isset($_POST['id_region']) ? $_POST['id_region'] : "";
    $image = isset($_FILES['image']) ? $_FILES['image']['name'] : "";

//check if element is not empty;

    if ($nom_destination != "" && $description_destination != "" && $id_region != "" && $image != "") {

        $image_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_tmp, "uploads/" . $image);

        $sql = "INSERT INTO destination
                (nom_destination, description_destination, image, id_tourguide, id_region)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $nom_destination,
            $description_destination,
            $image,
            1,
            $id_region
        ]);

         header("Location: add.php");
        exit;
    }
}

include 'includes/header.php';
?>
   
   
   
   
   






<form action="" method="POST" enctype="multipart/form-data">

    <label for="Nom_de_destination">Nom de destination :</label>
    <input type="text" id="Nom_de_destination" name="nom_destination" required>

    <br>

    <label for="description">Description :</label>
    <textarea id="description" name="description_destination" required></textarea>

    <br>

    <label for="image">Image :</label>
    <input type="file" id="image" name="image" required>

    <br>

    <label for="region">Region</label>
   
    <select name="id_region" required>

        <option value="">Choisir une region</option>

        <?php foreach ($regions as $region) { ?>

            <option value="<?= $region['id_region'] ?>">
                <?= $region['nom_region'] ?>
            </option>

        <?php } ?>

    </select>


    <br>

    <button type="submit">Ajouter</button>

</form>



<?php include "includes/footer.php"?>




























