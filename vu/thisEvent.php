<?php if ($_SESSION['rank'])
    { ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Cet event </title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../jquery.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



</head>

<body>

<div class="container">

    <?php include "header.php" ?>



    <section>

        <h1> detail de l'event :</h1>

        <div>

            <?php foreach ($details as $detail ) { ?>

                <div class="form">


                    <h4><?= $detail->title ?></h4>

                    <hr>

                    <div>

                        <span> à <?= $detail->city ?> le <?= strftime('%d-%m-%Y', strtotime($detail->date)) ?> pour <?= $detail->hours ?> </span>

                    </div>

                    <div>
                        <span>adresse : <?= $detail->place ?> </span>
                    </div>

                    <div>
                        <span> description : <?= $detail->event_describe ?></span>
                    </div>

                    <div>
                        <span> nombre de participant désiré : <?= $detail->number_of_places ?></span>

                    </div>

                    <div>
                        <span>Nombre de participant : <?= count($participants) ?> / <?= $details[0]->number_of_places ?></span>

                    </div>




                </div>


                <input type="text" style="display: none" id="id_comm" value=" <?= $_GET['id_event'] ?>">


        </div>


                <?php } ?>


    </section>

    <section>
        <h3 class="center"> Participants à l'event :</h3>

        <div>

            <div class="form flex">

            <?php foreach ($adherents as $adherent ) { ?>

                    <div>

                        <span><?= $adherent->pseudo ?>, </span>
                        <span><?= $adherent->age ?> ans</span>
                        <span><?= $adherent->sexe ?></span>


                    </div>

            <?php }

                if (!empty($participations)) {
                    ?>
                    <a href="../index.php?controller=user&action=abandon&id_event=<?= $_GET['id_event'] ?>" class="crudUser" onclick="return confirm('êtes vous sûr de ne plus vouloir participer à cet évènement ?')"> Ne plus participer </a>

                    <?php
                };

                if ((int)$details[0]->number_of_places > (int)count($participants)) {

                    if (empty ($participations)) {
                        ?>

                        <a href="../index.php?controller=user&action=participation&id_event=<?= $_GET['id_event'] ?>" class="crudUser"> participer à l'event </a>

                    <?php }
                }?>

            </div>


        </div>


    </section>

        <?php if ($_SESSION['rank'] == 2) { ?>

            <span style="display: none" id="rank_admin"> <?= $_SESSION['id_user'] ?> </span>

        <?php }

        if ($_SESSION['rank'] == 1) { ?>

            <span style="display: none" id="rank_user"> <?= $_SESSION['id_user'] ?> </span>

        <?php }
        ?>

    <section>

        <form action="" class="form flex">

            <label for="comm"> commentaire : </label>
            <textarea id="comm" required> </textarea>

            <input type="button" id="bt_comm" value="valider" class="bouton">

        </form>

        <div id="commentaire"> </div>



    </section>

    <footer>  </footer>


</div>

<?php } else {
    ?>

    <div class="form">

        <p> veuillez vous connecter </p>

    </div>

    <?php
} ?>

<script src="../script.js"></script>
</body>
</html>

