<?php if ($_SESSION['rank'] == 2)
{ ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>page des utilisateurs </title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../jquery.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

<div class="container">


    <?php include "header.php" ?>



    <section>

        <h1> Liste des utilisateurs valides :</h1>

        <div>

                 <?php foreach ($listeUsers as $user ) {

                     if ($user->validite == 1) {?>

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
                            <th> rank </th>
                            <th> delete </th>
                            <th> edit </th>

                            <tr>

                                <td><?= $user->name ?></td>
                                <td><?= $user->surname ?></td>
                                <td> <?= $user->sexe ?> </td>
                                <td><?= $user->age ?></td>
                                <td><?= $user->mail ?></td>
                                <td><?= $user->city ?></td>
                                <td><?= $user->pseudo ?></td>
                                <td><?= $user->password ?></td>
                                <td><?= $user->about ?></td>
                                <td> <?= $user->rank ?></td>

                                <td> <a href="../index.php?controller=admin&action=deleteUser&id=<?= $user->id_user ?>" onclick="return confirm('êtes vous sûr de vouloir supprimer ce compte ?')"> delete </a> </td>
                                <td> <a href="../index.php?controller=admin&action=editUserPage&id=<?=$user->id_user ?>&name=<?=$user->name ?>&sexe=<?=$user->sexe ?>&surname=<?=$user->surname ?>&age=<?=$user->age ?>&mail=<?=$user->mail ?>&city=<?=$user->city ?>&pseudo=<?=$user->pseudo ?>&password=<?=$user->password ?>&about=<?=$user->about ?>&rank=<?=$user->rank ?>"> edit </a> </td>


                            </tr>

                        </table>



                    <?php }
                 } ?>

                </div>


    </section>

    <section>

        <h1> Liste des utilisateurs non valides :</h1>

        <div>

            <?php foreach ($listeUsers as $user ) {

                if ($user->validite == null) {?>

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
                        <th> rank </th>
                        <th> delete </th>
                        <th> edit </th>

                        <tr>

                            <td><?= $user->name ?></td>
                            <td><?= $user->surname ?></td>
                            <td> <?= $user->sexe ?> </td>
                            <td><?= $user->age ?></td>
                            <td><?= $user->mail ?></td>
                            <td><?= $user->city ?></td>
                            <td><?= $user->pseudo ?></td>
                            <td><?= $user->password ?></td>
                            <td><?= $user->about ?></td>
                            <td> <?= $user->rank ?></td>

                            <td> <a href="../index.php?controller=admin&action=deleteUser&id=<?= $user->id_user ?>" onclick="return confirm('êtes vous sûr de vouloir supprimer ce compte ?')"> delete </a> </td>
                            <td> <a href="../index.php?controller=admin&action=editUserPage&id=<?=$user->id_user ?>&name=<?=$user->name ?>&sexe=<?=$user->sexe ?>&surname=<?=$user->surname ?>&age=<?=$user->age ?>&mail=<?=$user->mail ?>&city=<?=$user->city ?>&pseudo=<?=$user->pseudo ?>&password=<?=$user->password ?>&about=<?=$user->about ?>&rank=<?=$user->rank ?>"> edit </a> </td>


                        </tr>

                    </table>



                <?php }
            } ?>

        </div>


    </section>



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