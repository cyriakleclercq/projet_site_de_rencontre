<?php if ($_SESSION['rank'])
{ ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>page de création d'event </title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<div class="container">

    <?php include "header.php" ?>


    <h1> Créez votre event : </h1>

    <section>

        <div class="alert"> <?= $alert ?> </div>

        <form action="../index.php?controller=user&action=create" method="post" class="form">

            <div class="flex formG">

                <label for="inp_title"> Titre de votre event  </label>
                <input type="text" name="title" required id="inp_title">

                <label for="inp_place"> Adresse de votre event  </label>
                <input type="text" name="place" required id="inp_place">

                <label for="inp_city"> Ville de votre event  </label>
                <input type="text" name="city" required id="inp_city">

            </div>

            <div class="flex formD">

                <label for="inp_number_of_places"> Nombre de participant désiré </label>
                <input type="number" name="number_of_places" required id="inp_number_of_places">

                <label for="inp_date"> Date de votre event </label>
                <input type="date" name="date" required id="inp_date">

                <label for="inp_hours"> heure de votre event </label>
                <input type="time" name="hours" required id="inp_hours">

            </div>

            <div class="flex about">

                <label for="inp_event_describe"> Description de votre event  </label>
                <textarea name="event_describe" required id="inp_event_describe"> </textarea>

                <input type="submit" value="valider" class="bouton">

            </div>

        </form>




    </section>

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