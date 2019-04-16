<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>page d'accueil </title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.js"></script>
    <script src="../angular-route.min.js"></script>

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

        <h1> detail de l'event :</h1>

        <div>

            <?php foreach ($details as $detail ) { ?>

                    <table>

                        <th> Titre </th>
                        <th> Description de l'event </th>
                        <th> Adresse </th>
                        <th> Ville </th>
                        <th> nombre de place </th>
                        <th> Date </th>
                        <th> Heure </th>

                        <tr>

                            <td><?= $detail->title ?></td>
                            <td><?= $detail->event_describe ?></td>
                            <td><?= $detail->place ?></td>
                            <td><?= $detail->city ?></td>
                            <td><?= $detail->number_of_places ?></td>
                            <td><?= $detail->date ?></td>
                            <td><?= $detail->hours ?></td>


                        </tr>

                    </table>



                <?php } ?>

        </div>

    </section>

    <section>

        <div id="commentaires" data-ng-app="commentaires"> </div>



    </section>

    <footer>  </footer>




</div>

<script src="../script.js"></script>

</body>
</html>