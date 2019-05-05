<?php if ($_SESSION['rank'])
    { ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vos events </title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>

<body>

<div class="container">

    <?php include "header.php" ?>



    <section>

        <h1> Liste de vos events :</h1>


            <?php foreach ($listEvents as $event ) {

                if (strtotime($event->date) - time() > 0) { ?>

                    <div class="form">

                        <h4><?= $event->title ?></h4>

                        <hr>

                        <div>

                            <span> à <?= $event->city ?> le <?= strftime('%d-%m-%Y', strtotime($event->date)) ?> pour <?= $event->hours ?> </span>

                        </div>

                        <div>
                            <span>adresse : <?= $event->place ?> </span>
                        </div>

                        <div>
                            <span> description : <?= $event->event_describe ?></span>
                        </div>

                        <div>
                            <span> nombre de participant désiré : <?= $event->number_of_places ?></span>

                        </div>

                        <div class="crudUser">

                             <a href="../index.php?controller=user&action=details&id_event=<?=$event->id_event?>""> details </a>
                             <a href="../index.php?controller=user&action=deleteEvent&id=<?=$event->id_event ?>" onclick="return confirm('êtes vous sûr de vouloir supprimer cet evenement ?')"> delete </a>
                             <a href="../index.php?controller=user&action=edit&id_event=<?= $event->id_event ?>&title=<?= $event->title ?>&place=<?=$event->place ?>&city=<?=$event->city ?>&description=<?=$event->event_describe ?>&nbr=<?=$event->number_of_places ?>&date=<?=$event->date ?>&hours=<?=$event->hours ?>"> edit </a>

                        </div>
                    </div>

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