<?php

    include('task_repository.php');

    $day = '';

    $tasks = getAllTasks();

    if(isset($_POST['submit']))
    {
        if($_POST['day'])
        {
            $day = $_POST['day'];
            $tasks = getTasksByDate($day);
        }
        else if ($_POST['day'] == '')
        {
            $tasks = getAllTasks();
        }
        
    }
    else
    {
        $tasks = getAllTasks();
    }

?>

<!DOCTYPE html>
<html>
    <?php include('templates/header.php'); ?>

    <h4 class="center grey-text">Dagbok</h4>

    <form action="index.php" method="post">
        <label for="">Sök specifikt datum:</label>
        <input type="date" name="day" value="<?php echo htmlspecialchars($day) ?>" min="<?php echo getFirstDate() ?>" max="<?php echo getLastDate() ?>">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
    </form>

    <div class="container">
        <div class="row">

            <?php 
                if(empty($tasks))
                {
                    include('diary/empty.php');
                }
                else
                {
                    foreach($tasks as $task)
                    {
                        include('diary/not_empty.php');
                    }
                }
            ?>

        </div>
    </div>

    

    <?php include('templates/footer.php'); ?>
</html>