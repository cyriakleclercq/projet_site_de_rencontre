<?php session_start();

if ($_SESSION['rank'])
{ ?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>page d'edition </title>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/style.css">
        <script src="../jquery.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

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


                <div class="formG flex">

                    <label for="inp_title"> Titre de l'event  </label>
                    <input type="text" name="title" id="inp_title" required value="<?= $_GET['title'] ?>">

                    <label for="inp_place"> Adresse de l'event  </label>
                    <input type="text" name="place" id="inp_place" required value="<?= $_GET['place'] ?>">

                    <label for="inp_city"> Ville de l'event  </label>
                    <input type="text" name="city" id="inp_city" required value="<?= $_GET['city'] ?>">

                </div>

                <div class="formD flex">

                    <label for="inp_number_of_places"> Nombre de participant désiré </label>
                    <input type="number" min="2" name="number_of_places" id="inp_number_of_places" required value="<?= $_GET['nbr'] ?>">

                    <label for="inp_date"> Date de l'event </label>
                    <input type="date" name="date" id="inp_date" required value="<?= $_GET['date'] ?>">

                    <label for="inp_hours"> heure de l'event </label>
                    <input type="time" name="hours" id="inp_hours" required value="<?= $_GET['hours'] ?>">

                </div>

                <div class="about flex">

                    <label for="inp_event_describe"> Description de l'event  </label>
                    <textarea name="event_describe" id="inp_event_describe" required> <?= $_GET['description'] ?> </textarea>



                    <input type="submit" value="valider" class="bouton">

                </div>


            </form>

        </section>

            <?php }

        if (isset($_GET['id_event']) && isset($_GET['id_comment']) && isset($_GET['comment']))
        {?>

        <h1> Editez votre commentaire : </h1>

        <section>

            <form action="../index.php?controller=user&action=editComm" method="post" class="form flex">

                <input type="text" style="display: none" name="id_event" value="<?= $_GET['id_event'] ?>">

                <input type="text" style="display: none" name="id_comment" value="<?= $_GET['id_comment'] ?>">

                <label for="comm"> commentaire : </label>
                <textarea id="comm" name="comment" required> <?= $_GET['comment'] ?> </textarea>

                <input type="submit" value="valider" class="bouton">

            </form>

        </section>

            <?php }

        if (isset($_GET['name']) && isset($_GET['surname']))
            { ?>

                <h1> edition de ton profil, <?= $_GET['name'] ?> : </h1>

                <section>

                    <form action="../index.php?controller=user&action=editProfil" method="post" class="form">

                        <div class="formG flex">

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

                        </div>

                        <div class="formD flex">

                            <label for="inp_age"> age : </label>
                            <input type="number" min="0" id="inp_age" required name="age" value="<?= $_GET['age'] ?>">

                            <label for="inp_city"> ville : </label>
                            <input type="text" id="inp_city" required name="city" value="<?= $_GET['city'] ?>">

                            <label for="inp_password"> password : </label>
                            <input type="text" id="inp_password" required name="password" value="<?= $_GET['password'] ?>">

                        </div>

                        <div class="about flex ">

                            <label for="inp_about"> à propos : </label>
                            <textarea id="inp_about" required name="about"> <?= $_GET['about'] ?> </textarea>

                            <input type="submit" value="valider" class="bouton">

                        </div>

                    </form>

                </section>

        <?php } ?>

        <footer class="photo1 footer"> </footer>




    </div>
    <script src="../script2.js"></script>

    </body>
    </html>

<?php } else {
    ?>

    <div class="form">

        <p> veuillez vous connecter </p>

    </div>

    <?php
}