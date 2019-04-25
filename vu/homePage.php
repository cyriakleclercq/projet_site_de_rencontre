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

            <h1> <?= $alert ?> </h1>

            <h1> Liste des events :</h1>

            <div>

                <?php foreach ($listeEvents as $event ) { ?>

                    <table id="table">

                        <th> Titre </th>
                        <th> description </th>

                        <tr>

                            <td><?= $event->title ?></td>
                            <td><?= $event->event_describe ?></td>
                        </tr>


                    </table>

                    <?php if (!isset($_SESSION['name'])) { ?>

                        <p class="comm" > Pour plus de détails, vous devez être connecté </p >

                        <?php } else {

                        ?> <div class="comm"> <a href="../index.php?controller=user&action=details&id_event=<?=$event->id_event?>"> Plus d'infos </a> </div>
                    <?php }

                 } ?>


            </div>




        </section>

        <footer>  </footer>




    </div>

</body>
</html>