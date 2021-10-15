<?php

require('model/database.php'); 

if(isset($_POST['validate'])) {

    if(!empty($_POST['task_name'])){
        
        $taskName = htmlspecialchars($_POST['task_name']);
        $taskDate = date($_POST['task_date']);
        $taskComment = htmlspecialchars($_POST['task_comment']);

        $insertTaskOnToDoList = $bdd->prepare('INSERT INTO task(task_name, task_date, task_comment) VALUES(?, ?, ?)');
        $insertTaskOnToDoList->execute(array($taskName, $taskDate, $taskComment));

        $successMsg = "La tache a bien été ajouté";

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}