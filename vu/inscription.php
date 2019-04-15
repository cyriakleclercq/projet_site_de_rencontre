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

    <header>

        <a href="../index.php"> page d'accueil </a>
        <a href="connexion.php"> connexion </a>
        <a href="inscription.php"> inscription </a>

    </header>

    <h1> Page d'inscription : </h1>

    <section>

        <form action="../index.php?controller=visitor&action=inscription" method="post" class="form">

            <label for="inp_name"> name : </label>
            <input type="text" id="inp_name" name="name">

            <label for="inp_surname"> surname : </label>
            <input type="text" id="inp_surname" name="surname">

            <label for="inp_mail"> adresse mail : </label>
            <input type="email" id="inp_mail" name="mail">

            <label for="inp_age"> age : </label>
            <input type="number" id="inp_age" name="age">

            <label for="inp_city"> ville : </label>
            <input type="text" id="inp_city" name="city">

            <label for="inp_pseudo"> pseudo : </label>
            <input type="text" id="inp_pseudo" name="pseudo">

            <label for="inp_password"> password : </label>
            <input type="password" id="inp_password" name="password">

            <label for="inp_about"> à propos : </label>
            <textarea id="inp_about" name="about"> </textarea>

            <input type="submit" value="valider">

        </form>




    </section>

    <footer>  </footer>




</div>

</body>
</html>