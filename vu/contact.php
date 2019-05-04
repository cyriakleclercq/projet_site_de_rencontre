<?php if ($_SESSION['rank'])
    { ?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>page de contact </title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="container">

    <?php include "header.php" ?>

    <h3 class="center crudUser"> Nous contacter</h3>


    <section>

        <form action="../index.php?controller=user&action=mail" method="post" class="form flex">

            <label for="titreContact"> titre : </label>
            <input type="text" id="titreContact" required name="titre">


            <label for="messageContact"> message : </label>
            <textarea id="messageContact" class="about" name="message" required> </textarea>

            <input type="submit" id="bt_contact" value="valider" class="bouton">

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