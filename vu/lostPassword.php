<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>mot de passe oublié </title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<div class="container">

    <?php include "header.php" ?>


    <h1> Veuillez renseigner votre adresse mail : </h1>

    <section>

        <form action="../index.php?controller=visitor&action=forgotPassword" method="post" class="form">

            <label for="inp_mail"> mail : </label>
            <input type="email" id="inp_mail" required name="mail">

            <input type="submit" value="valider">

            <?= $reponse ?>

        </form>


    </section>

    <footer>  </footer>

</div>

</body>
</html>