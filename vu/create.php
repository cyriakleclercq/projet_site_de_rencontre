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


    <h1> Créez votre event : </h1>

    <section>

        <form action="../index.php?controller=user&action=create" method="post" class="form">

            <label for="inp_title"> Titre de votre event  </label>
            <input type="text" name="title" id="inp_title">

            <label for="inp_place"> Adresse de votre event  </label>
            <input type="text" name="place" id="inp_place">

            <label for="inp_city"> Ville de votre event  </label>
            <input type="text" name="city" id="inp_city">

            <label for="inp_event_describe"> Description de votre event  </label>
            <textarea name="event_describe" id="inp_event_describe"> </textarea>

            <label for="inp_number_of_places"> Nombre de participant désiré </label>
            <input type="number" name="number_of_places" id="inp_number_of_places">

            <label for="inp_date"> Date de votre event </label>
            <input type="date" name="date" id="inp_date">

            <label for="inp_hours"> heure de votre event </label>
            <input type="time" name="hours" id="inp_hours">

            <input type="submit" value="valider">

        </form>




    </section>

    <footer>  </footer>




</div>

</body>
</html>