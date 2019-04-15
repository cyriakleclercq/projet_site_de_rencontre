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

        <a href="../index.php"> page d'accueil </a>


        <?php if (isset($_SESSION['rank'])) { ?>

            <a href="../index.php?controller=user&action=affichageUser"> table des utilisateurs </a>
            <a href="../index.php?controller=user&action=logout"> logout </a>
            <a href="vu/create.php"> créer un évènement </a>
            <a href="../index.php?controller=user&action=affichageEvent"> afficher les évènements </a>

        <?php } ?>
    </header>


    <section>

        <h1> Liste des events :</h1>

        <div>

            <?php foreach ($listeEvents as $event ) { ?>

                <table>

                    <th> Titre </th>
                    <th> description </th>
                    <th> delete </th>
                    <th> edit </th>

                    <tr>

                        <td><?= $event->title ?></td>
                        <td><?= $event->event_describe ?></td>
                        <td> <a href="../index.php?controller=user&action=deleteEvent&id=<?=$event->id_event ?>"> delete </a> </td>
                        <td> <a href="vu/editEvent.php?id=<?= $event->id_event ?>&title=<?= $event->title ?>&place=<?=$event->place ?>&city=<?=$event->city ?>&description=<?=$event->event_describe ?>&nbr=<?=$event->number_of_places ?>&date=<?=$event->date ?>&hours=<?=$event->hours ?>"> edit </a> </td>


                    </tr>

                </table>



            <?php } ?>

        </div>




    </section>

    <footer>  </footer>




</div>

</body>
</html>