<?php
    require('controller/addTaskController.php');
    require('controller/showAllTaskController.php');
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'; ?>

<body>
    <br><br>
    <h1 style="text-align:center">ToDoList</h1>
    <br><br>

    <form class="container" method="POST">

        <?php
            if(isset($errorMsg)) {
                echo '<p>'.$errorMsg.'</p>';    
            }elseif(isset($successMsg)){
                echo '<p>'.$successMsg.'</p>';
            }
        ?>

        <div class="form-group row">
            <div class="col-8">
                <input type="text" name="taskName"  placeholder="Tâche" class="form-control">
            </div>
            <div class="col-4">
                <input type="date" name="taskDate" class="form-control">
            </div>
            <br><br>
            <div class="col-12">
                <textarea type="text" name="taskComment" placeholder="Commentaire" class="form-control"></textarea>
                <br>
            </div>
            <button class="btn btn-success" type="submit" name="validate">Ajouter</button>
        </div>
    </form>
    
    <br><br>

    <?php
        while($task = $getAllTask->fetch()){
            ?>
            <div class="list-group">
                <a class="list-group-item list-group-item-action active" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><?php echo $task['task_name']; ?></h5>
                        <small>Dead line : <?php echo $task['task_date']; ?></small>
                    </div>
                    <p class="mb-1"><?php echo $task['task_comment']; ?></p>
                    <button class="btn btn-info" type="submit" name="validate">Modifier</button>
                    <a href="controller/deleteTaskController.php?id=<?php echo $task['id']; ?>" class="btn btn-danger">Supprimer</a>
                </a>
            </div> 
            <br><br>
            <?php
        }
    ?>

</body>
</html>