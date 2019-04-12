<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>page d'accueil </title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="container">

        <header>

            <a href="../index.php"> page d'accueil </a>
            <a href="../index.php?controller=user&action=affichage"> table des utilisateurs </a>
            <a href="vu/connexion.php"> connexion </a>
            <a href="vu/inscription.php"> inscription </a>
            <a href="../index.php?controller=user&action=logout"> logout </a>
            <a href="vu/create.php"> créer un évènement </a>
            <a href="affichageEvent.php"> afficher les évènements </a>

        </header>


        <section>

            <h1> Liste des events :</h1>

            <div>

                <?php foreach ($listeEvents as $event ) { ?>

                    <table>

                        <th> Titre </th>
                        <th> description </th>
                        <th> delete </th>
                        <th> edit </th>


                        <tr>

                            <td><?= $event->title ?></td>
                            <td><?= $event->event_describe ?></td>

                            <td> <a href=""> delete </a> </td>
                            <td> <a href=""> edit </a> </td>


                        </tr>

                    </table>



                <?php } ?>

            </div>




        </section>

        <footer>  </footer>




    </div>

</body>
</html>