<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>page de connexion </title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../jquery.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

<div class="container">

    <?php include "header.php" ?>


    <h1> Page de connexion : </h1>

    <section>

        <form action="../index.php?controller=visitor&action=connection" method="post" class="form flex">

            <label for="inp_pseudo"> pseudo : </label>
            <input type="text" id="inp_pseudo" required name="pseudo">

            <label for="inp_password"> password : </label>
            <input type="password" id="inp_password" required name="password">

            <input type="submit" value="valider" class="bouton">

            <?= $alert ?>

            <a href="../index.php?controller=visitor&action=lostPassword"> Mot de passe oublié ?</a>

        </form>



    </section>

    <footer class="photo1 footer"> </footer>




</div>
<script src="../script2.js"></script>

</body>
</html>