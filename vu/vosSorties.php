<?php if ($_SESSION['rank'])
    { ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vos sorties </title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="container">

    <?php include "header.php" ?>



    <section>

        <?php if (isset($_GET['id_user']))
            { ?>

                <h1> Liste de ses sorties :</h1>

            <?php } else { ?>

        <h1> Liste de vos sorties :</h1>

<?php } ?>

        <?php foreach ($listSorties as $sortie ) {

            if (strtotime($sortie->date) - time() > 0) { ?>
        <div class="form">

            <div>

                <div class="formG">

                    <h4><?= $sortie->title ?> </h4>

                </div>

                <div class="formD" style="text-align: right">

                   <span> par <?= $sortie->pseudo ?>  </span>

                </div>


            </div>

            <hr style="clear: both">

            <div>

                <span> à <?= $sortie->city ?> le <?= strftime('%d-%m-%Y', strtotime($sortie->date)) ?> pour <?= $sortie->hours ?> </span>

            </div>

            <div>
                <span>adresse : <?= $sortie->place ?> </span>
            </div>

            <div>
                <span> description : <?= $sortie->event_describe ?></span>
            </div>

            <div>
                <span> nombre de participant désiré : <?= $sortie->number_of_places ?></span>

            </div>

            <div class="crudUser">

                <a href="../index.php?controller=user&action=details&id_event=<?=$sortie->id_event?>"> Commentaires </a>

                <?php if (!$_REQUEST['id_user'])
                { ?>

                    <a href="../index.php?controller=user&action=abandon&id_event=<?= $sortie->id_event ?>&sortie" onclick="return confirm('êtes vous sûr de ne plus vouloir participer à cet évènement ?')"> Annuler </a>

                <?php } ?>

            </div>

        </div>

        <?php }
        }  ?>



</section>

<footer>  </footer>




</div>

</body>
</html>

    <?php } else {
    ?>

    <div class="form">

        <p> veuillez vous connecter </p>

    </div>

    <?php
}