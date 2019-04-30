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