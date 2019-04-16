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

    <header>

        <a href="../index.php"> Page d'accueil </a>


        <?php session_start();

        if (isset($_SESSION['rank'])) { ?>

            <a href="../index.php?controller=user&action=affichageUser"> table des utilisateurs </a>
            <a href="../index.php?controller=user&action=logout"> logout </a>
            <a href="vu/create.php"> créer un évènement </a>
            <a href="../index.php?controller=user&action=affichageEvent"> afficher les évènements </a>
            <a href="../index.php?controller=user&action=vosEvent"> afficher vos évènements </a>


        <?php } ?>
    </header>


    <section>

        <h2> bienvenue <?= $_SESSION['pseudo'] ?> </h2>

        <h1> Liste de vos events :</h1>

        <div>

            <?php foreach ($listeEvents as $event ) {

                if ( $event->id_user == $_SESSION['id_user'] ) {?>

                <table>

                    <th> Titre </th>
                    <th> Description de l'event </th>
                    <th> Adresse </th>
                    <th> Ville </th>
                    <th> nombre de place </th>
                    <th> Date </th>
                    <th> Heure </th>

                    <th> delete </th>
                    <th> edit </th>

                    <tr>

                        <td><?= $event->title ?></td>
                        <td><?= $event->event_describe ?></td>
                        <td><?= $event->place ?></td>
                        <td><?= $event->city ?></td>
                        <td><?= $event->number_of_places ?></td>
                        <td><?= $event->date ?></td>
                        <td><?= $event->hours ?></td>

                        <td> <a href="../index.php?controller=user&action=deleteEvent&id=<?=$event->id_event ?>"> delete </a> </td>
                        <td> <a href="vu/editVosEvent.php?id=<?= $event->id_event ?>&title=<?= $event->title ?>&place=<?=$event->place ?>&city=<?=$event->city ?>&description=<?=$event->event_describe ?>&nbr=<?=$event->number_of_places ?>&date=<?=$event->date ?>&hours=<?=$event->hours ?>"> edit </a> </td>


                    </tr>

                </table>



            <?php }
            } ?>

        </div>




    </section>

    <footer>  </footer>




</div>

</body>
</html>