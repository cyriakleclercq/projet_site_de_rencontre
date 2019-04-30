<?php session_start();

if ($_SESSION['rank'])
{ ?>

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

        <?php include "header.php";

        if ( isset($_GET['id_event']) && isset($_GET['title']) && isset($_GET['place']))
        {
        ?>

        <h1> Editer l'event "<?= $_GET['title']  ?>" : </h1>

        <section>

            <form action="../index.php?controller=user&action=editEvent" method="post" class="form">

                <input type="text" style="display: none" name="id_event" required id="inp_id" value="<?= $_GET['id_event'] ?>">

                <label for="inp_title"> Titre de l'event  </label>
                <input type="text" name="title" id="inp_title" required value="<?= $_GET['title'] ?>">

                <label for="inp_place"> Adresse de l'event  </label>
                <input type="text" name="place" id="inp_place" required value="<?= $_GET['place'] ?>">

                <label for="inp_city"> Ville de l'event  </label>
                <input type="text" name="city" id="inp_city" required value="<?= $_GET['city'] ?>">

                <label for="inp_event_describe"> Description de l'event  </label>
                <input type="text" name="event_describe" id="inp_event_describe" required value="<?= $_GET['description'] ?>">

                <label for="inp_number_of_places"> Nombre de participant désiré </label>
                <input type="number" name="number_of_places" id="inp_number_of_places" required value="<?= $_GET['nbr'] ?>">

                <label for="inp_date"> Date de l'event </label>
                <input type="date" name="date" id="inp_date" required value="<?= $_GET['date'] ?>">

                <label for="inp_hours"> heure de l'event </label>
                <input type="time" name="hours" id="inp_hours" required value="<?= $_GET['hours'] ?>">

                <input type="submit" value="valider">

            </form>

        </section>

            <?php }

        if (isset($_GET['id_event']) && isset($_GET['id_comment']) && isset($_GET['comment']))
        {?>

        <h1> Editer le commentaire "<?= $_GET['titre']  ?>" : </h1>

        <section>

            <form action="../index.php?controller=user&action=editComm" method="post" class="form">

                <input type="text" style="display: none" name="id_event" value="<?= $_GET['id_event'] ?>">

                <input type="text" style="display: none" name="id_comment" value="<?= $_GET['id_comment'] ?>">

                <label for="comm"> commentaire : </label>
                <textarea id="comm" name="comment" required> <?= $_GET['comment'] ?> </textarea>

                <input type="submit" value="valider">

            </form>

        </section>

            <?php }

        if (isset($_GET['name']) && isset($_GET['surname']))
            { ?>

                <h1> edition de votre profil <?= $_GET['name'] ?> <?=$_GET['surname'] ?> : </h1>

                <section>

                    <form action="../index.php?controller=user&action=editProfil" method="post" class="form">

                        <label for="inp_name"> name : </label>
                        <input type="text" id="inp_name" required name="name" value="<?= $_GET['name'] ?>">

                        <label for="inp_surname"> surname : </label>
                        <input type="text" id="inp_surname" required name="surname" value="<?= $_GET['surname'] ?>">

                        <label for="inp_sexe"> sexe : </label>
                        <select name="sexe" id="inp_sexe">
                            <option value="<?= $_GET['sexe'] ?>" selected> <?= $_GET['sexe'] ?> </option>
                            <option value="femme"> femme </option>
                            <option value="homme"> homme </option>
                        </select>

                        <label for="inp_mail"> adresse mail : </label>
                        <input type="email" id="inp_mail" required name="mail" value="<?= $_GET['mail'] ?>">

                        <label for="inp_age"> age : </label>
                        <input type="number" id="inp_age" required name="age" value="<?= $_GET['age'] ?>">

                        <label for="inp_city"> ville : </label>
                        <input type="text" id="inp_city" required name="city" value="<?= $_GET['city'] ?>">

                        <label for="inp_pseudo"> pseudo : </label>
                        <input type="text" id="inp_pseudo" required name="pseudo" value="<?= $_GET['pseudo'] ?>">

                        <label for="inp_password"> password : </label>
                        <input type="text" id="inp_password" required name="password" value="<?= $_GET['password'] ?>">

                        <label for="inp_about"> à propos : </label>
                        <textarea id="inp_about" required name="about"> <?= $_GET['about'] ?> </textarea>

                        <input type="submit" value="valider">

                    </form>

                </section>

        <?php } ?>

        <footer>  </footer>




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