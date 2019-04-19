

<header>

    <a href="../index.php"> page d'accueil </a>


    <?php     session_start();

    if(!isset($_SESSION['rank'])) { ?>

    <a href="../index.php?controller=visitor&action=connexionPage"> connexion </a>
    <a href="../index.php?controller=visitor&action=inscriptionPage"> inscription </a>

    <?php } ?>

    <?php session_start();


    if (isset($_SESSION['rank'])) { ?>

        <a href="../index.php?controller=user&action=createPage"> créer un évènement </a>
        <a href="../index.php?controller=user&action=vosEvent"> afficher vos évènements </a>

    <?php }

    if (isset($_SESSION['rank']) && $_SESSION['rank'] == 2) {?>

        <a href="../index.php?controller=user&action=affichageUser"> table des utilisateurs </a>
        <a href="../index.php?controller=user&action=affichageEvent"> afficher les évènements </a>


    <?php }

    if (isset($_SESSION['rank'])) { ?>

        <a href="../index.php?controller=user&action=profil"> Page de profil</a>
        <a href="../index.php?controller=user&action=PagedeContact"> Page de contact </a>
        <a href="../index.php?controller=user&action=logout"> logout </a>
<?php } ?>

</header>