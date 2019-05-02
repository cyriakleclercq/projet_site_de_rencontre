<?php session_start(); if ($_SESSION['rank'])
{ ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>page de profil </title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>

<div class="container">


    <?php include "header.php" ?>



    <section>

        <h1> Vos informations :</h1>

        <div>

            <?php foreach ($profil as $i ) { ?>

                <table>

                    <th> name</th>
                    <th> surname</th>
                    <th> sexe </th>
                    <th> age </th>
                    <th> mail </th>
                    <th> city </th>
                    <th> pseudo </th>
                    <th> password</th>
                    <th> about </th>
                    <th> supprimer votre compte </th>
                    <th> editer vos informations </th>

                    <tr>

                        <td><?= $i->name ?></td>
                        <td><?= $i->surname ?></td>
                        <td><?= $i->sexe ?> </td>
                        <td><?= $i->age ?></td>
                        <td><?= $i->mail ?></td>
                        <td><?= $i->city ?></td>
                        <td><?= $i->pseudo ?></td>
                        <td><?= $i->password ?></td>
                        <td><?= $i->about ?></td>

                        <td> <a href="../index.php?controller=user&action=deleteProfil" onclick="return confirm('êtes vous sûr de vouloir supprimer votre compte ?');"> delete </a> </td>
                        <td> <a href="../index.php?controller=user&action=edit&name=<?=$i->name ?>&sexe=<?=$i->sexe ?>&surname=<?=$i->surname ?>&age=<?=$i->age ?>&mail=<?=$i->mail ?>&city=<?=$i->city ?>&pseudo=<?=$i->pseudo ?>&password=<?=$i->password ?>&about=<?=$i->about ?>"> edit </a> </td>


                    </tr>

                </table>

            <?php } ?>

        </div>


    </section>

    <section>

        <h3> rechercher un utilisateur : </h3>

        <form action="../index.php?controller=user&action=profil" method="post" class="form">

            <label for="inp_pseudo"> pseudo : </label>
            <input type="text" id="inp_pseudo" required name="pseudo">

            <input type="submit" value="rechercher">

        </div>

    </section>

    <section>


        <?php if($reponse || $search )
            { ?>

            <div class="form">

                <?php if ($reponse)

                    { ?>

                    <p> <?= $reponse ?> </p>

               <?php } elseif ($search[0]->pseudo !== $_SESSION['pseudo']) { ?>


                    <p> <?= $search[0]->pseudo ?> </p>
                    <p> <?= $search[0]->sexe ?> </p>
                    <p> <?= $search[0]->age ?> ans </p>
                    <p> <?= $search[0]->about ?> </p>

                    <?php if (!$checkFriend)
                        { ?>

                    <a href="../index.php?controller=user&action=friend&id_friend=<?= $search[0]->id_user ?>"> demander en ami </a>

                            <?php }
                 } else {
                    ?>
                <p> Vos infos sont déjà plus haut :p </p>

                <?php

                } ?>

            </div>

        <?php } ?>

    </section>

    <section>

        <?php if ($check)
            { ?>

                <div class="form">

                <h3> Vos demandes d'amis : </h3>

                    <div class="form">

                        <?php foreach ($check as $i)
                            { ?>

                        <p> <?= $i->pseudo ?> </p>
                        <p> <?= $i->age ?> ans </p>
                        <p> <?= $i->about ?></p>
                        <a href="../index.php?controller=user&action=confirm&id_friend=<?= $i->id_user ?>"> accepter </a>
                        <a href="../index.php?controller=user&action=refus&id_friend=<?=$i->id_user ?>" onclick="return confirm('êtes vous sûr de vouloir refuser cette demande ?')"> refuser </a>

                                <?php }?>
                    </div>

                </div>

           <?php } ?>


    </section>

        <section>

            <div class="form">

                <h3> Vos amis : </h3>

                <?php if ($friends)
{
    foreach ($friends as $friend)
    { ?>

        <a href="../index.php?controller=user&action=vosSorties&id_user=<?= $friend->id_user ?>"> <?= $friend->pseudo ?> </a>
        <a href="../index.php?controller=user&action=deleteFriend&id_friend=<?= $friend->id_user ?>"> retirer de vos amis </a>

    <?php }
} ?>

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