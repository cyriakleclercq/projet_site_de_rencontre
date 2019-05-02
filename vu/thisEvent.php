<?php if ($_SESSION['rank'])
    { ?>

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
        <h3> Participants à l'event :</h3>

        <div>

            <?php foreach ($adherents as $adherent ) { ?>

                <table>

                    <th> pseudo </th>
                    <th> age </th>
                    <th> sexe </th>

                    <tr>

                        <td><?= $adherent->pseudo ?></td>
                        <td><?= $adherent->age ?></td>
                        <td><?= $adherent->sexe ?></td>

                    </tr>

                </table>


            <?php } ?>

        </div>


    </section>

    <section>

        <?php

            if (!empty($participations)) {
                ?>
                <a href="../index.php?controller=user&action=abandon&id_event=<?= $_GET['id_event'] ?>" onclick="return confirm('êtes vous sûr de ne plus vouloir participer à cet évènement ?')"> Ne plus participer </a>

            <?php
        };

            if ((int)$details[0]->number_of_places > (int)count($participants)) {

                if (empty ($participations)) {
                    ?>

                    <a href="../index.php?controller=user&action=participation&id_event=<?= $_GET['id_event'] ?>"> participer à l'event </a>

                <?php }
            }?>

    </section>

    <section>

        nombre de participant : <?= count($participants) ?> / <?= $details[0]->number_of_places ?>

        <?php if ($_SESSION['rank'] == 2) { ?>

            <span id="rank_admin"> <?= $_SESSION['id_user'] ?> </span>

        <?php }

        if ($_SESSION['rank'] == 1) { ?>

            <span id="rank_user"> <?= $_SESSION['id_user'] ?> </span>

        <?php }
        ?>

    </section>

    <section>

        <form action="" class="form">

            <label for="comm"> commentaire : </label>
            <textarea id="comm" required> </textarea>

            <input type="button" id="bt_comm" value="valider">

        </form>

        <div id="commentaire">

        <div id="supp"> </div>
        </div>



    </section>

    <footer>  </footer>


    <script src="../script.js"></script>
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