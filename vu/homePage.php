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

            <?php session_start(); if(!isset($_SESSION['rank'])) { ?>

            <a href="vu/connexion.php"> connexion </a>
            <a href="vu/inscription.php"> inscription </a>

 <?php } ?>

            <?php if (isset($_SESSION['rank'])) { ?>

                <a href="../index.php?controller=user&action=affichageUser"> table des utilisateurs </a>
            <a href="../index.php?controller=user&action=logout"> logout </a>
            <a href="vu/create.php"> créer un évènement </a>
            <a href="../index.php?controller=user&action=affichageEvent"> afficher les évènements </a>
            <a href="../index.php?controller=user&action=vosEvent"> afficher vos évènements </a>


            <?php } ?>
        </header>


        <section>

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

                        <p class="comm" > pour voir les commentaires vous devez être connecté </p >

                        <?php } else {

                        ?> <div class="comm"> <a href="index.php?controller=user&action=details&id=<?=$event->id_event?>"> Plus d'infos </a> </div>
                    <?php }

                 } ?>


            </div>




        </section>

        <footer>  </footer>




    </div>

</body>
</html>