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
        <a href="../index.php?controller=user&action=affichageUser"> table des utilisateurs </a>
        <a href="../index.php?controller=user&action=logout"> logout </a>
        <a href="create.php"> créer un évènement </a>
        <a href="../index.php?controller=user&action=affichageEvent"> afficher les évènements </a>
        <a href="../index.php?controller=user&action=vosEvent"> afficher vos évènements </a>


    </header>

    <h1> edition de <?= $_GET['name'] ?> <?=$_GET['surname'] ?> : </h1>

    <section>

        <form action="../index.php?controller=user&action=editUser" method="post" class="form">

            <input type="text" style="display: none" id="inp_id" name="id" value="<?= $_GET['id'] ?>">

            <label for="inp_name"> name : </label>
            <input type="text" id="inp_name" name="name" value="<?= $_GET['name'] ?>">

            <label for="inp_surname"> surname : </label>
            <input type="text" id="inp_surname" name="surname" value="<?= $_GET['surname'] ?>">

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

            <label for="inp_rank"> rank : </label>

            <select name="rank" id="inp_rank">
                <option value="<?= $_GET['rank'] ?> selected"> <?php if( $_GET['rank'] == 1) { echo "user";  } else echo "admin"; ?> </option>
                <option value="1"> user </option>
                <option value="2"> admin </option>
            </select>

            <input type="submit" value="valider">

        </form>




    </section>

    <footer>  </footer>




</div>

</body>
</html>