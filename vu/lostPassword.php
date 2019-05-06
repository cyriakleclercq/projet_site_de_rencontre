<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>mot de passe oublié </title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../jquery.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

<div class="container">

    <?php include "header.php" ?>


    <h1 style="margin-bottom: 7%"> Veuillez renseigner votre adresse mail : </h1>

    <section>

        <form action="../index.php?controller=visitor&action=forgotPassword" method="post" class="form flex">

            <label for="inp_mail"> Adresse mail : </label>
            <input type="email" id="inp_mail" required name="mail">

            <input type="submit" value="valider" class="bouton">

            <?= $reponse ?>

        </form>


    </section>

    <footer class="photo1 footer"> </footer>

</div>
<script src="../script2.js"></script>

</body>
</html>