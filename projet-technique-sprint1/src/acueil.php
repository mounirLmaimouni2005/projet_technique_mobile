<?php

include 'connect_db.php';

$sql = "SELECT destination.*,
               region.nom_region,
               tourguide.nom_complete_tourguide,
               tourguide.email_tourguide,
               tourguide.telephone
        FROM destination
        JOIN region ON destination.id_region = region.id_region
        JOIN tourguide ON destination.id_tourguide = tourguide.id_tourguide";

$destinations = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

include 'includes/header.php';
?>

<h2>Les destinations</h2>

<div class="destinations">

    <?php foreach ($destinations as $destination) { ?>

        <div class="destination">

            <h3><?= $destination['nom_destination'] ?></h3>

            <p><?= $destination['description_destination'] ?></p>

            <img src="uploads/<?= $destination['image'] ?>" alt="Destination">

            <p>
                <strong>Region :</strong>
                <?= $destination['nom_region'] ?>
            </p>

            <h4>Tour Guide</h4>

            <p>
                <strong>Nom :</strong>
                <?= $destination['nom_complete_tourguide'] ?>
            </p>

            <p>
                <strong>Email :</strong>
                <?= $destination['email_tourguide'] ?>
            </p>

            <p>
                <strong>Téléphone :</strong>
                <?= $destination['telephone'] ?>
            </p>

        </div>

    <?php } ?>

</div>

<?php include 'includes/footer.php'; ?>