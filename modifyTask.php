<?php
    require('controller/showAllTaskController.php');
    require('controller/getInfosOfEditTaskController.php');
    require('controller/editTaskController.php');
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
                <input type="text" name="task_name"  placeholder="Tâche" class="form-control" value="<?= $task_name; ?>">
            </div>
            <div class="col-4">
                <input type="date" name="task_date" class="form-control" value="<?= $task_date; ?>">
            </div>
            <br><br>
            <div class="col-12">
                <textarea type="text" name="task_comment" placeholder="Commentaire" class="form-control"><?= $task_comment; ?></textarea>
                <br>
            </div>
            <button class="btn btn-success" type="submit" name="validate">Modifier la tâche</button>
        </div>
    </form>
    
    <br><br>

    <?php
        while($task = $getAllTask->fetch()){
            ?>
            <div class="list-group">
                <div class="list-group-item list-group-item-action active" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><?php echo $task['task_name']; ?></h5>
                        <small>Dead line : <?php echo $task['task_date']; ?></small>
                    </div>
                    <p class="mb-1"><?php echo $task['task_comment']; ?></p>
                    <a href="controller/deleteTaskController.php?id=<?php echo $task['id']; ?>" class="btn btn-danger">Supprimer</a>
                </div>
            </div> 
            <br><br>
            <?php
        }
    ?>

</body>
</html>