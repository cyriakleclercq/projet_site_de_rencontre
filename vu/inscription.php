<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>page d'inscription </title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../jquery.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

<div class="container">

    <?php include "header.php" ?>


    <h1> Page d'inscription : </h1>

    <section>

        <form action="../index.php?controller=visitor&action=inscription" method="post" class="form">

            <div class="flex formG">

                <label for="inp_name"> name : </label>
                <input type="text" id="inp_name" required name="name">

                <label for="inp_surname"> surname : </label>
                <input type="text" id="inp_surname" required name="surname">

                <label for="inp_sexe"> sexe : </label>
                <select name="sexe" id="inp_sexe">
                    <option value="homme" selected> homme </option>
                    <option value="femme"> femme </option>
                </select>

                <?=  $alert2 ?>
                <label for="inp_mail"> adresse mail : </label>
                <input type="email" id="inp_mail" required name="mail">

            </div>

                <div class="flex formD">
                <label for="inp_age"> age : </label>
                <input type="number" min="0" id="inp_age" required name="age">

                <label for="inp_city"> ville : </label>
                <input type="text" id="inp_city" required name="city">

                <?= $alert1 ?>
                <label for="inp_pseudo"> pseudo : </label>
                <input type="text" id="inp_pseudo" required name="pseudo">

                <label for="inp_password"> password : </label>
                <input type="password" id="inp_password" required name="password">

            </div>

            <div class="flex about">

                <label for="inp_about"> à propos : </label>
                <textarea id="inp_about" name="about"> </textarea>

                <input type="submit" value="valider" class="bouton">

            </div>
        </form>




    </section>

    <footer class="photo1 footer">  </footer>




</div>
<script src="../script2.js"></script>

</body>
</html>