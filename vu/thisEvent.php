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

                <input type="text" style="display: none" id="id_comm" value=" <?= $_GET['id_event'] ?>">




                <?php } ?>

        </div>

    </section>

    <section>

        <?php

        print_r($details[0]->'stdClass Object');

        if ($details['number_of_places'] < count($participants)) {

            if (!empty($participations)) {
                ?>
                <a href="../index.php?controller=user&action=abandon&id_event=<?= $_GET['id_event'] ?>&id_user=<?= $_SESSION['id_user'] ?>">
                    Ne plus participer </a>

            <?php }
        };

        if (empty ($participations)) {
                ?>

                <a href="../index.php?controller=user&action=participation&id_event=<?= $_GET['id_event'] ?>"> participer à l'event </a>

            <?php } ?>

    </section>

    <section>

        nombre de participant : <?= count($participants) ?>
    </section>

    <section>

        <div id="commentaire"> </div>

        <form action="" class="form">

            <label for="titreComm"> titre : </label>
            <input type="text" id="titreComm">

            <label for="comm"> commentaire : </label>
            <textarea id="comm"> </textarea>

            <input type="submit" id="bt_comm" value="valider">

        </form>


    </section>

    <footer>  </footer>


    <script src="../script.js"></script>
</div>

</body>
</html>