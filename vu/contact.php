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



    <section>

        <div id="contact"> </div>

        <form action="../index.php?controller=user&action=mail" class="form">

            <label for="titreContact"> titre : </label>
            <input type="text" id="titreContact" namz="titre">

            <label for="messageContact"> message : </label>
            <textarea id="messageContact" name="message"> </textarea>

            <input type="submit" id="bt_contact" value="valider">

        </form>


    </section>

    <footer>  </footer>


</div>

</body>
</html>