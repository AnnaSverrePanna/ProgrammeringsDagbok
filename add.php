<?php

    include('task_repository.php');
    include('task_validator.php');

    $time = $whatHappend = $howItWent = '';
    $errors = array('time' => '', 'whatHappend' => '', 'howItWent' => '');

    if(isset($_POST['submit'])) 
    {
        $time = $_POST['time'];
        $whatHappend = $_POST['whatHappend'];
        $howItWent = $_POST['howItWent'];

        $errors = validate($time, $whatHappend, $howItWent);

        if(!array_filter($errors)) //checks if there arent any errors
        {
            addTask($time, $whatHappend, $howItWent);
        }
    }

?>

<!DOCTYPE html>
<html>
    <?php include('templates/header.php'); ?>

    <section class="container grey_text">
        <h4  class="center grey-text">Lägg till task</h4>
        <form action="add.php" class="white" method="POST">
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
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php'); ?>
</html>