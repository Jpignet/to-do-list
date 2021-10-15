<?php

    require('model/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfTask = $_GET['id'];

    // vérifier si la tache existe 
    $checkIfTaskExists = $bdd->prepare('SELECT * FROM task WHERE id = ?');
    $checkIfTaskExists->execute(array($idOfTask));

    if($checkIfTaskExists->rowCount() > 0) {        //rowCount permet de calculer le nombre de requete supérieur a 0

        // Récupérer les données de la tache 
        $taskInfos = $checkIfTaskExists->fetch();
    
        $task_name = $taskInfos['task_name'];
        $task_comment = $taskInfos['task_comment'];
        $task_date = $taskInfos['task_date'];

        // permet de supprimer les balises <br> dans le code html
        //$question_description = str_replace('<br />', '', $question_description);
        //$question_content = str_replace('<br />', '', $question_content);
    }else{
        $errorMsg = "Aucune tache n'a été trouvée";
    }   

}else{
    $errorMsg = "Aucune tache n'a été trouvée";
}
