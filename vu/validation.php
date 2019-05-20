
<?php session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>page de confirmation </title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../jquery.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

<div class="container">


    <div class="form flex">

<?php if ($_SESSION['rank']) {

        if ($contactClose) { ?>

            <p> <?= $contactClose ?> </p>


            <a href="index.php"> retour </a>

        <?php }

        if ($editComm) { ?>

            <p> <?= $editComm ?> </p>

            <a href="../index.php?controller=user&action=details&id_event=<?= $id_event ?>"> retour </a>

        <?php }

        if ($editEvent) { ?>

            <p> <?= $editEvent ?> </p>


            <a href="../index.php?controller=user&action=vosEvent"> retour </a>

        <?php }

        if ($error) { ?>

            <p> <?= $error ?> </p>


            <a href="../index.php?controller=user&action=profil"> retour </a>

            <?php }

        if ($profil) { ?>

            <p> <?= $profil ?> </p>


            <a href="../index.php?controller=user&action=profil"> retour </a>

        <?php }

        if ($create) { ?>

            <p> <?= $create ?> </p>


            <a href="../index.php?controller=user&action=vosEvent"> retour </a>

        <?php }

        } elseif ($inscription) { ?>

        <p> <?= $inscription ?> </p>

        <a href="../index.php?controller=visitor&action=connexionPage"> retour </a>

        <?php } elseif ($validationPassword) { ?>

        <p> <?= $validationPassword ?> </p>


    <a href="../index.php"> retour </a>

<?php }
        if ($logout) { ?>

        <p> <?= $logout ?> </p>


        <a href="../index.php"> retour </a>


        <?php } else { ?>

            <p> Veuillez vous connecter </p>

        <?php } ?>


    </div>

</div>

</body>
</html>

