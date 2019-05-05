<?php session_start(); if ($_SESSION['rank'])
{ ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>page de profil </title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

<div class="container">


    <?php include "header.php" ?>



    <section>

        <h1> Vos informations :</h1>

        <div class="form info">

            <?php foreach ($profil as $i ) { ?>

                <div class="formG">

                    <div>
                        <span>nom : <?= $i->surname ?> </span>
                    </div>

                    <div>
                        <span>prénom : <?= $i->name ?></span>
                    </div>

                    <div>
                        <span>sexe : <?= $i->sexe ?></span>
                    </div>

                    <div>
                        <span>age : <?= $i->age ?></span>
                    </div>

                </div>

              <div class="formD">

                  <div>
                      <span>adresse mail : <?= $i->mail ?></span>
                  </div>

                  <div>
                      <span>Ville : <?= $i->city ?></span>
                  </div>

                  <div>
                      <span>Pseudo : <?= $i->pseudo ?></span>
                  </div>

                  <div>
                      <span>A propos : <?= $i->about ?></span>
                  </div>

              </div>

                <div class="crudUser about perso">

                    <a href="../index.php?controller=user&action=deleteProfil" onclick="return confirm('êtes vous sûr de vouloir supprimer votre compte ?');"> delete </a>
                    <a href="../index.php?controller=user&action=edit&name=<?=$i->name ?>&sexe=<?=$i->sexe ?>&surname=<?=$i->surname ?>&age=<?=$i->age ?>&mail=<?=$i->mail ?>&city=<?=$i->city ?>&pseudo=<?=$i->pseudo ?>&password=<?=$i->password ?>&about=<?=$i->about ?>"> edit </a>

                </div>

            <?php } ?>

        </div>

        <div class="formG">

            <section>

                <div class="form">

                    <h3 class="center""> Vos amis : </h3>

                    <?php if ($friends)
                    {
                        foreach ($friends as $friend)
                        { ?>

                            <div class="crudUser friend"">

                                <a href="../index.php?controller=user&action=vosSorties&id_user=<?= $friend->id_user ?>"> <?= $friend->pseudo ?> </a>
                                <a href="../index.php?controller=user&action=deleteFriend&id_friend=<?= $friend->id_user ?>"> retirer de vos amis </a>

                            </div>

                        <?php }
                    } ?>

                </div>

        <section>

            <?php if ($check)
            { ?>

                <div class="form">

                    <h3> Vos demandes d'amis : </h3>



                        <?php foreach ($check as $i)
                        { ?>
                    <div class="friend">

                        <div class="flex">

                            <span> <?= $i->pseudo ?> </span>
                            <span> <?= $i->age ?> ans </span>

                        </div>

                        <div class="crudUser">

                            <a href="../index.php?controller=user&action=confirm&id_friend=<?= $i->id_user ?>"> accepter </a>
                            <a href="../index.php?controller=user&action=refus&id_friend=<?=$i->id_user ?>" onclick="return confirm('êtes vous sûr de vouloir refuser cette demande ?')"> refuser </a>

                        </div>

                    </div>
                        <?php }?>


                </div>

            <?php } ?>


        </section>

            </section>


        </div>

        <div class="formD">

            <section>



                <form action="../index.php?controller=user&action=profil" method="post" class="form flex">

                    <h3 style="text-align: center"> Rechercher un utilisateur : </h3>

                    <label for="inp_pseudo"> pseudo : </label>
                    <input type="text" id="inp_pseudo" required name="pseudo">

                    <input type="submit" value="rechercher" class="bouton">

                </form>

            </section>

            <?php if($reponse || $search )
            { ?>

                <div class="form flex">

                    <?php if ($reponse)

                    { ?>

                        <p> <?= $reponse ?> </p>

                    <?php } elseif ($search[0]->pseudo !== $_SESSION['pseudo']) { ?>


                        <span> <?= $search[0]->pseudo ?> </span>
                        <span> <?= $search[0]->sexe ?> </span>
                        <span> <?= $search[0]->age ?> ans </span>
                        <span> <?= $search[0]->about ?> </span>

                        <?php if (!$checkFriend)
                        { ?>

                            <div class="crudUser">

                                <a href="../index.php?controller=user&action=friend&id_friend=<?= $search[0]->id_user ?>"> demander en ami </a>

                            </div>

                        <?php }
                    } else {
                        ?>
                        <p> Vos infos sont déjà plus haut :p </p>

                        <?php

                    } ?>

                </div>

            <?php } ?>


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