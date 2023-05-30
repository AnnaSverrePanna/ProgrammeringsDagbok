<?php

    include('task_repository.php');
    include('task_validator.php');
    
    $id = substr_replace($_GET['id'] ,"", -1);
    $taskData = getTaskDataFromId($id);
    $time = $taskData[0]['time'];
    $whatHappend = $taskData[0]['whatHappend'];
    $howItWent = $taskData[0]['howItWent'];
    $date = $taskData[0]['created_at'];

    if(isset($_POST['delete'])) 
    {
        deleteTask($id);
    }

?>

<!DOCTYPE html>
<html>
    <?php include('templates/header.php'); ?>

    <section class="container grey_text">
        <h4  class="center grey-text">Är du säker på att du vill ta bort denna tasken?</h4>

        <div class="all-diary-entries">
            <div class="card z-depth-0 diary-entry">
                <div class="card-content">
                    <h6 class="center"> 
                        <?php echo htmlspecialchars((new DateTime($date))->format('Y/m/d')); ?> 
                    </h6>
                    
                    <div class="container">
                        <div>
                            <b>Tid det tog:</b> <?php echo htmlspecialchars($time); ?> min
                        </div>
                        <div>
                            <b>Vilken task:</b> <?php echo htmlspecialchars($whatHappend); ?>
                        </div>
                        <div>
                            <b>Hur det gick:</b> <?php echo htmlspecialchars($howItWent); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="all-diary-entries">
            <div class="z-depth-0 diary-entry">
                <div class="row">
                    <div class="col s6">
                        <form action="delete.php?id=<?php echo htmlspecialchars($id); ?>;" method="POST">
                            <div class="center">
                                <input type="submit" name="delete" value="Ja" class="btn brand z-depth-0">
                            </div>
                        </form>
                    </div>
                    <div class="col s6">
                        <form action="index.php" method="POST">
                            <div class="center">
                                <input type="submit" name="cancel" value="Nej" class="btn brand z-depth-0">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <?php include('templates/footer.php'); ?>
</html>