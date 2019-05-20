<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>page d'accueil </title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery.js"></script>

</head>

<body>

    <div class="container">

        <?php include "header.php" ?>

        <section>

            <h1> <?= $alert ?> </h1>

            <h1> Liste des événements :</h1>


            <ul class="ulHomepage">

                <form action="../index.php" method="post" id="searchHomepage">
                    <label for="filtre"> rechercher une ville</label>
                    <input type="text" id="filtre" name="filtre">
                    <input type="submit" class="bouton">

                </form>

                <?php foreach ($listeEvents as $event ) {

                    if (strtotime($event->date) - time() > 0) { ?>

                                <li><?= $event->title ?> (<?= $event->city ?>)</li>


                        <?php if (!isset($_SESSION['name'])) { ?>

                            <div class="comm"><span> Pour plus de détails, vous devez être connecté </span></div>

                        <?php } else {

                            ?>
                            <div class="comm mt-2"><a href="../index.php?controller=user&action=details&id_event=<?= $event->id_event ?>">Plus d'infos </a></div>
                        <?php }

                    }
                 } ?>

             </ul>

        </section>

        <footer class="photo1 footer"> </footer>

    </div>

<script src="../script.js"></script>
<script src="../script2.js"></script>

</body>
</html>