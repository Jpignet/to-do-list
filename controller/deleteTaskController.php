
<?php

    require('../model/database.php');

// Vérifier si l'id est rentré en paramétre de l'URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    // L'id de la question en paramétre 
    $idOfTheTask = $_GET['id'];

    // Vérifier si la question existe 
    $checkIfTaskExists = $bdd->prepare('SELECT id FROM task WHERE id = ?', array($idOfTheTask)); // séléctionner toute les données dans notre table question qui posséde l'id rentré par l'utilisateur
    $checkIfTaskExists->execute(array($idOfTheTask));

    if($checkIfTaskExists->rowCount() > 0){

        // Récupéré les infos de la question 
        $taskInfos = $checkIfTaskExists->fetch();
            
        // Supprimer la question en fonction de sont id rentré en pramètre
        $deleteThisTask = $bdd->prepare('DELETE FROM task WHERE id = ?');
        $deleteThisTask->execute(array($idOfTheTask));

        // Rediriger l'utilisateur vers ses questions
        header('Location: ../addTask.php');

    }else{
        echo "Aucune question n'a été trouvée";
    }

}else{
    echo "Aucune question n'a été trouvée";
}