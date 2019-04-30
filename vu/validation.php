
<?php session_start();

if ($_SESSION['rank']) {?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>page d'accueil </title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<div class="container">

    <div class="form">

        <?php if ($inscription)
            { ?>

        <p> <?= $inscription ?> </p>

        <a href="../index.php?controller=visitor&action=connexionPage"> retour </a>

        <?php }

        if ($logout)

            { ?>

        <p> <?= $logout ?> </p>


        <a href="index.php"> retour </a>

        <?php }

        if ($contactClose)
            { ?>

        <p> <?= $contactClose ?> </p>


        <a href="index.php"> retour </a>

        <?php }

        if ($editComm)
            { ?>

        <p> <?= $editComm ?> </p>

        <a href="../index.php?controller=user&action=details&id_event=<?=$id_event ?>"> retour </a>

         <?php }

        if ($validationPassword)
        { ?>

        <p> <?php $validationPassword ?> </p>


        <a href="../index.php"> retour </a>

        <?php }

        if ($editEvent)
        { ?>

            <p> <?= $editEvent ?> </p>


            <a href="../index.php?controller=user&action=vosEvent"> retour </a>

        <?php }

        if ($profil)
        { ?>

            <p> <?= $profil ?> </p>


            <a href="../index.php?controller=user&action=profil"> retour </a>

        <?php }

        if ($create)
        { ?>

            <p> <?= $create ?> </p>


            <a href="../index.php?controller=user&action=vosEvent"> retour </a>

        <?php } ?>


    </div>
</div>

</body>
</html>

<?php } else { ?>

<p> Veuillez vous connecter </p>

<?php } ?>