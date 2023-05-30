<?php

    include('task_repository.php');
    include('task_validator.php');
    
    $id = substr_replace($_GET['id'] ,"", -1);
    $taskData = getTaskDataFromId($id);
    $time = $taskData[0]['time'];
    $whatHappend = $taskData[0]['whatHappend'];
    $howItWent = $taskData[0]['howItWent'];
    
    $errors = array('time' => '', 'whatHappend' => '', 'howItWent' => '');

    if(isset($_POST['edit'])) 
    {
        $time = $_POST['time'];
        $whatHappend = $_POST['whatHappend'];
        $howItWent = $_POST['howItWent'];

        $errors = validate($time, $whatHappend, $howItWent);

        if(!array_filter($errors)) //checks if there arent any errors
        {
            $id = substr_replace($_GET['id'] ,"", -1);
            editTask($id, $time, $whatHappend, $howItWent);
        }
    }

?>

<!DOCTYPE html>
<html>
    <?php include('templates/header.php'); ?>

    <section class="container grey_text">
        <h4  class="center grey-text">Ändra task</h4>
        <form action="edit.php?id=<?php echo htmlspecialchars($id); ?>;" class="white" method="POST">
            <label for="">Tid det tog (minuter):</label>
            <input type="text" name="time" value="<?php echo htmlspecialchars($time) ?>">
            <div class="red-text"><?php echo $errors['time'] ?></div>

            <label for="">Vad som hände:</label>
            <input type="text" name="whatHappend" value="<?php echo htmlspecialchars($whatHappend) ?>">
            <div class="red-text"><?php echo $errors['whatHappend'] ?></div>

            <label for="">Hur det gick:</label>
            <input type="text" name="howItWent" value="<?php echo htmlspecialchars($howItWent) ?>">
            <div class="red-text"><?php echo $errors['howItWent'] ?></div>

            <div class="center">
                <input type="submit" name="edit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php'); ?>
</html>