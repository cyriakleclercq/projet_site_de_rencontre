<?php if ($_SESSION['rank'])
    { ?>

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


            <table>

                <th> Titre </th>
                <th> Description de l'event </th>
                <th> Adresse </th>
                <th> Ville </th>
                <th> nombre de place </th>
                <th> Date </th>
                <th> Heure </th>
                <th> Organisateur </th>
                <th> Voir les commentaires </th>

                <?php if (!$_REQUEST['id_user'])
                { ?>
                    <th> Participation </th>

                <?php } ?>


                <tr>

                    <td><?= $sortie->title ?></td>
                    <td><?= $sortie->event_describe ?></td>
                    <td><?= $sortie->place ?></td>
                    <td><?= $sortie->city ?></td>
                    <td><?= $sortie->number_of_places ?></td>
                    <td><?= strftime('%d-%m-%Y', strtotime($sortie->date)) ?></td>
                    <td><?= $sortie->hours ?></td>
                    <td><?= $sortie->pseudo ?></td>
                    <td> <a href="../index.php?controller=user&action=details&id_event=<?=$sortie->id_event?>"> Commentaires </a> </td>

                    <?php if (!$_REQUEST['id_user'])
                        { ?>

                            <td> <a href="../index.php?controller=user&action=abandon&id_event=<?= $sortie->id_event ?>&sortie" onclick="return confirm('êtes vous sûr de ne plus vouloir participer à cet évènement ?')"> Annuler </a> </td>

                        <?php } ?>


                </tr>

            </table>

        <?php }
        }  ?>

</div>

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