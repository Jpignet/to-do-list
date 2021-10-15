<?php

require('model/database.php'); 

if(isset($_POST['validate'])) {

    if(!empty($_POST['taskName'])){
        
        $taskName = htmlspecialchars($_POST['taskName']);
        $taskDate = date($_POST['taskDate']);
        $taskComment = htmlspecialchars($_POST['taskComment']);

        $insertTaskOnToDoList = $bdd->prepare('INSERT INTO task(task_name, task_date, task_comment) VALUES(?, ?, ?)');
        $insertTaskOnToDoList->execute(array($taskName, $taskDate, $taskComment));

        $successMsg = "La tache a bien été ajouté";

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}