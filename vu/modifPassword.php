<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>modification de password </title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

<div class="container">

    <?php include "header.php" ?>


    <h1> entrez votre nouveau mot de passe : </h1>

    <section>

        <form action="../index.php?controller=visitor&action=newPassword" method="post" class="form">

            <input type="text" style="display: none" id="inp_mail" required name="mail" value="<?= $_GET['mail']?>">

            <label for="inp_password"> new password : </label>
            <input type="password" id="inp_password" required name="password">

            <input type="submit" value="valider">

        </form>


    </section>

    <footer>  </footer>

</div>

</body>
</html>