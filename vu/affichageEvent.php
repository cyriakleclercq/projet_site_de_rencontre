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

        <h1> Liste des events :</h1>

        <div>

            <?php foreach ($events as $event ) { ?>

                <table>

                    <th> pseudo </th>
                    <th> Titre </th>
                    <th> Description de l'event </th>
                    <th> Adresse </th>
                    <th> Ville </th>
                    <th> nombre de place </th>
                    <th> Date </th>
                    <th> Heure </th>
                    <th> détails </th>
                    <th> delete </th>


                    <tr>

                        <td><?= $event->pseudo ?></td>
                        <td><?= $event->title ?></td>
                        <td><?= $event->event_describe ?></td>
                        <td><?= $event->place ?></td>
                        <td><?= $event->city ?></td>
                        <td><?= $event->number_of_places ?></td>
                        <td><?= $event->date ?></td>
                        <td><?= $event->hours ?></td>
                        <td><a href="../index.php?controller=user&action=details&id_event=<?=$event->id_event?>"> press </a></td>
                        <td> <a href="../index.php?controller=admin&action=deleteEvent&id=<?=$event->id_event ?>" onclick="return confirm('êtes vous sûr de vouloir supprimer cet évènement ?')"> delete </a> </td>


                    </tr>

                </table>



            <?php } ?>

        </div>




    </section>

    <footer>  </footer>




</div>

</body>
</html>