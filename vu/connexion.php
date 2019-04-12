<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>page de connexion </title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<div class="container">

    <header>

        <a href="../index.php"> page d'accueil </a>
        <a href="../index.php?controller=user&action=affichage"> table des utilisateurs </a>
        <a href="connexion.php"> connexion </a>
        <a href="inscription.php"> inscription </a>
        <a href="../index.php?controller=user&action=logout"> logout </a>
        <a href="create.php"> créer un évènement </a>
        <a href="affichageEvent.php"> afficher les évènements </a>

    </header>

    <h1> Page de connexion : </h1>

    <section>

        <form action="../index.php?controller=visitor&action=connection" method="post" class="form">

            <label for="inp_user"> username : </label>
            <input type="text" id="inp_user" name="pseudo">

            <label for="inp_password"> password : </label>
            <input type="password" id="inp_password" name="password">

            <input type="submit" value="valider">

        </form>



    </section>

    <footer>  </footer>




</div>

</body>
</html>