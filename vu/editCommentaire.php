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


    <h1> Editer le commentaire "<?= $_GET['titre']  ?>" : </h1>

    <section>

        <form action="../index.php?controller=user&action=editComm" method="post" class="form">

            <input type="text" name="id_event" value="<?= $_GET['id_event'] ?>">

            <input type="text" name="id_comment" value="<?= $_GET['id_comment'] ?>">

            <label for="titreComm"> titre : </label>
            <input type="text" name="title" id="titreComm" required value="<?= $_GET['titre']  ?>">

            <label for="comm"> commentaire : </label>
            <textarea id="comm" name="comment" required> <?= $_GET['comment'] ?> </textarea>

            <input type="submit" value="valider">

        </form>




    </section>

    <footer>  </footer>




</div>

</body>
</html>