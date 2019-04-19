<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>page d'inscrption </title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<div class="container">

    <?php include "header.php" ?>


    <h1> edition de votre profil <?= $_GET['name'] ?> <?=$_GET['surname'] ?> : </h1>

    <section>

        <form action="../index.php?controller=user&action=editProfil" method="post" class="form">

            <label for="inp_name"> name : </label>
            <input type="text" id="inp_name" name="name" value="<?= $_GET['name'] ?>">

            <label for="inp_surname"> surname : </label>
            <input type="text" id="inp_surname" name="surname" value="<?= $_GET['surname'] ?>">

            <label for="inp_sexe"> sexe : </label>
            <select name="sexe" id="inp_sexe">
                <option value="<?= $_GET['sexe'] ?>" selected> <?= $_GET['sexe'] ?> </option>
                <option value="femme"> femme </option>
                <option value="homme"> homme </option>
            </select>

            <label for="inp_mail"> adresse mail : </label>
            <input type="email" id="inp_mail" name="mail" value="<?= $_GET['mail'] ?>">

            <label for="inp_age"> age : </label>
            <input type="number" id="inp_age" name="age" value="<?= $_GET['age'] ?>">

            <label for="inp_city"> ville : </label>
            <input type="text" id="inp_city" name="city" value="<?= $_GET['city'] ?>">

            <label for="inp_pseudo"> pseudo : </label>
            <input type="text" id="inp_pseudo" name="pseudo" value="<?= $_GET['pseudo'] ?>">

            <label for="inp_password"> password : </label>
            <input type="text" id="inp_password" name="password" value="<?= $_GET['password'] ?>">

            <label for="inp_about"> à propos : </label>
            <textarea id="inp_about" name="about"> <?= $_GET['about'] ?> </textarea>

            <input type="submit" value="valider">

        </form>




    </section>

    <footer>  </footer>




</div>

</body>
</html>