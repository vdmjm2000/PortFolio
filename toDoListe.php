<?php

$erreurs = "";
$db = new PDO('mysql:host=localhost;dbname=to_Do_List;charset=utf8', 'root', '');

if (isset($_POST['creer_tache'])) { // On vérifie que la variable POST existe
    if (empty($_POST['creer_tache'])) {  // On vérifie qu'elle as une 
        $erreurs = 'Vous devez indiquer la valeure de la tâche';
    } else {
        $tache = $_POST['creer_tache'];
        $db->exec("INSERT INTO liste(tache) VALUES('$tache')"); // On insère la tâche dans la base de donnée
    }
}

if(isset($_GET['supprimer_tache'])) {
    $id = $_GET['supprimer_tache'];
    $db->exec("DELETE FROM liste WHERE id=$id");
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/toDoListe.css">
    <title>Document</title>
</head>

<body>

    <div class="header">
        <p class="header_titre">Ma super Todo List ! </p>
    </div>

    <form class="taches_input" method="post" action="toDoListe.php">
        <input id="inserer" type="text" name="creer_tache" />
        <button id="envoyer">Créer</button>
    </form>

    <table class="taches">
        <tr>
            <th>
                N
            </th>
            <th>
                Nom
            </th>
            <th>
                Suppression
            </th>
        </tr>
        <?php
        $reponse = $db->query('Select * from liste'); // On exécute une requête visant à récupérer les tâches
        while ($taches = $reponse->fetch()) { // On initialise une boucle
        ?>
            <tr>
                <td><?php echo $taches['id'] ?></td>
                <td><?php echo $taches['tache'] ?></td>
                    <td><a class="suppr" href="toDoListe.php?supprimer_tache=<?php echo $taches['id'] ?>"> &#x1F5D1;</a>
            </tr>
        <?php
        }


        ?>



    </table>


    </table>

    <?php
    if (isset($erreurs))
    ?>
    <p><?php echo $erreurs ?></p>

    <?php
    ?>



</body>

</html>