<?php

session_start();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>page des utilisateurs </title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>

<div class="container">


    <header>

        <a href="../index.php"> page d'accueil </a>
        <a href="../index.php?controller=user&action=affichageUser"> table des utilisateurs </a>
        <a href="../index.php?controller=user&action=logout"> logout </a>
        <a href="vu/create.php"> créer un évènement </a>
        <a href="../index.php?controller=user&action=affichageEvent"> afficher les évènements </a>
        <a href="../index.php?controller=user&action=vosEvent"> afficher vos évènements </a>


    </header>


    <section>

        <?php if ( isset($_SESSION['rank']))
            {
                ?> <div> welcome <?= $_SESSION['name'] ?> </div> <?php
            } ?>

        <h1> Liste des utilisateurs :</h1>

        <div>

                 <?php foreach ($listeUsers as $user ) { ?>

                        <table>

                            <th> name</th>
                            <th> surname</th>
                            <th> age </th>
                            <th> mail </th>
                            <th> city </th>
                            <th> pseudo </th>
                            <th> password</th>
                            <th> about </th>
                            <th> rank </th>
                            <th> delete </th>
                            <th> edit </th>

                            <tr>

                                <td><?= $user->name ?></td>
                                <td><?= $user->surname ?></td>
                                <td><?= $user->age ?></td>
                                <td><?= $user->mail ?></td>
                                <td><?= $user->city ?></td>
                                <td><?= $user->pseudo ?></td>
                                <td><?= $user->password ?></td>
                                <td><?= $user->about ?></td>
                                <td> <?= $user->rank ?></td>
                                <td> <a href="../index.php?controller=user&action=deleteUser&id=<?= $user->id_user ?>"> delete </a> </td>
                                <td> <a href="vu/editUser.php?id=<?=$user->id_user ?>&name=<?=$user->name ?>&surname=<?=$user->surname ?>&age=<?=$user->age ?>&mail=<?=$user->mail ?>&city=<?=$user->city ?>&pseudo=<?=$user->pseudo ?>&password=<?=$user->password ?>&about=<?=$user->about ?>&rank=<?=$user->rank ?>"> edit </a> </td>


                            </tr>

                        </table>



                    <?php } ?>

                </div>


    </section>

    <footer>  </footer>




</div>

</body>
</html>