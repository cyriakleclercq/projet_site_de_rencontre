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

        <h1> Liste de vos sorties :</h1>


        <?php foreach ($listSorties as $sortie ) {

            ?>

            <table>

                <th> Titre </th>
                <th> Description de l'event </th>
                <th> Adresse </th>
                <th> Ville </th>
                <th> nombre de place </th>
                <th> Date </th>
                <th> Heure </th>
                <th> Organisateur </th>

                <tr>

                    <td><?= $sortie->title ?></td>
                    <td><?= $sortie->event_describe ?></td>
                    <td><?= $sortie->place ?></td>
                    <td><?= $sortie->city ?></td>
                    <td><?= $sortie->number_of_places ?></td>
                    <td><?= $sortie->date ?></td>
                    <td><?= $sortie->hours ?></td>
                    <td><?= $sortie->pseudo ?></td>


                </tr>

            </table>

        <?php }  ?>

</div>

</section>

<footer>  </footer>




</div>

</body>
</html>