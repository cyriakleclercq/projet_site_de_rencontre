<?php if ($_SESSION['rank'] == 2)
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

    <?php include "header.php" ?>
 required

    <h1> Editer l'event "<?= $_GET['title']  ?>" : </h1>

    <section>

        <form action="../index.php?controller=user&action=editEvent" method="post" class="form">

            <input type="text" style="display: none" name="id" required id="inp_id" value="<?= $_GET['id'] ?>">

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