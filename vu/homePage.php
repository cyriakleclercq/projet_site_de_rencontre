<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>page d'accueil </title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../jquery.js"></script>

</head>

<body>

    <div class="container">

        <?php include "header.php" ?>

        <section>

            <h1> <?= $alert ?> </h1>

            <h1> Liste des events :</h1>


                <form action="../index.php" method="post">
                    <label for="filtre"> rechercher une ville</label>
                    <input type="text" id="filtre" name="filtre">
                    <input type="submit">

                </form>



            <div>

                <?php foreach ($listeEvents as $event ) {

                    if (strtotime($event->date) - time() > 0) { ?>

                        <table id="table">

                            <th> Ville</th>
                            <th> Titre</th>
                            <th> description</th>
                            <th> time</th>


                            <tr>
                                <td><?= $event->city ?></td>
                                <td><?= $event->title ?></td>
                                <td><?= $event->event_describe ?></td>
                                <td><?= strftime('%d-%m-%Y', strtotime($event->date)) ?> </td>

                            </tr>


                        </table>

                        <?php if (!isset($_SESSION['name'])) { ?>

                            <p class="comm"> Pour plus de détails, vous devez être connecté </p>

                        <?php } else {

                            ?>
                            <div class="comm"><a
                                        href="../index.php?controller=user&action=details&id_event=<?= $event->id_event ?>">
                                    Plus d'infos </a></div>
                        <?php }

                    }
                 } ?>


            </div>




        </section>

        <footer>  </footer>


    </div>

    <script src="../script.js"></script>

</body>
</html>