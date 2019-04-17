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

                <input type="text" style="display: none" id="id_comm" value=" <?= $_GET['id'] ?>">



                <?php } ?>

        </div>

    </section>

    <section>

        <div id="commentaire"> </div>

        <form action="" method="get" class="form">

            <div>
            <label for="titreComm"> titre : </label>
            <input type="text" id="titreComm">

            </div>

            <div>
            <label for="comm"> commentaire : </label>
            <textarea id="comm"> </textarea>
            </div>

            <input type="submit" id="bt_post">

        </form>

    </section>

    <footer>  </footer>


    <script src="../script.js"></script>
</div>

</body>
</html>