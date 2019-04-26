
<?php session_start();

if (isset($_SESSION['rank'])) { ?>

    <div id="deco">

        <span> Bonjour <?= $_SESSION['pseudo']?></span>
        <a href="../index.php?controller=user&action=logout"> <img src="../css/Logout.png" id="img_logout" alt="image de logout"> </a>

    </div>

<?php }?>

<header>


    <div id="head">
        <a href="../index.php"> page d'accueil </a>


        <?php

        if(!isset($_SESSION['rank'])) { ?>

        <a href="../index.php?controller=visitor&action=connexionPage"> connexion </a>
        <a href="../index.php?controller=visitor&action=inscriptionPage"> inscription </a>

        <?php } ?>

        <?php

        if (isset($_SESSION['rank'])) { ?>

            <a href="../index.php?controller=user&action=createPage"> créer un évènement </a>
            <a href="../index.php?controller=user&action=vosEvent"> Vos events </a>
            <a href="../index.php?controller=user&action=vosSorties"> Vos sorties </a>


        <?php }

        if (isset($_SESSION['rank']) && $_SESSION['rank'] == 2) {?>

            <a href="../index.php?controller=admin&action=affichageUser"> table des utilisateurs </a>
            <a href="../index.php?controller=admin&action=affichageEvent"> afficher les évènements </a>


        <?php }

        if (isset($_SESSION['rank'])) { ?>

            <a href="../index.php?controller=user&action=profil"> Page de profil</a>
            <a href="../index.php?controller=user&action=PagedeContact"> Page de contact </a>

        <?php } ?>

    </div>
</header>


