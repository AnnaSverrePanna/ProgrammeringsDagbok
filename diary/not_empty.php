<div id="Dagbok" class="all-diary-entries">
    <div class="card z-depth-0 diary-entry">
        <div class="card-content">
            <h6 class="center"> 
                <?php echo htmlspecialchars((new DateTime($task['created_at']))->format('Y/m/d')); ?> 
            </h6>
            <div class="container">
                <div>
                    <b>Tid det tog:</b> <?php echo htmlspecialchars($task['time']); ?> min
                </div>
                <div>
                    <b>Vilken task:</b> <?php echo htmlspecialchars($task['whatHappend']); ?>
                </div>
                <div>
                    <b>Hur det gick:</b> <?php echo htmlspecialchars($task['howItWent']); ?>
                </div>
            </div>

            <div class="button-container">
                <a href="delete.php?id=<?php echo htmlspecialchars($task['id']); ?>;" class="brand-text" id="deleteButton"><h6>Ta bort</h6></a>
                <a href="edit.php?id=<?php echo htmlspecialchars($task['id']); ?>;" class="brand-text"><h6>Ändra</h6></a>
            </div>
        </div>
    </div>
</div>