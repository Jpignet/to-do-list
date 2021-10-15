<?php

    require('model/database.php');

// Validation du formulaire
if(isset($_POST['validate'])){

    // Vérifier si les champs sont remplie
    if(!empty($_POST['task_name'])){

        // Les données a faire passer dans la requête 
        $new_task_name = htmlspecialchars($_POST['task_name']);
        $new_task_comment = date($_POST['task_date']);
        $new_task_date = htmlspecialchars($_POST['task_comment']);

        // Modifier les informations de la question qui posséde l'id rentré en paramétre dans l'URL
        $editTaskOnWebite = $bdd->prepare('UPDATE task SET task_name = ?, task_date = ?, task_comment = ? WHERE id = ?');    // met a jour la table question. met a our le titre le contenu la description qui posséde cette identifiant 
        $editTaskOnWebite->execute(array($new_task_name, $new_task_comment, $new_task_date, $idOfTask));


        // redirection vers la page d'affichage des question de l'utilisateur 
        header('Location: addTask.php');

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}
