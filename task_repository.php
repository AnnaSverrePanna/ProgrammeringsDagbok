<?php

    function connect()
    {
        //Connect to database
        $conn = mysqli_connect('localhost', 'Anna', 'programmeringsDagbok', 'programmeringsdagbok');

        //check the connection
        if(!$conn) {
            echo 'Connection error: ' . mysqli_connect_error();
        }

        return $conn;
    }

    function closeConnection($conn)
    {
        //close connection to database
        mysqli_close($conn);
    }

    function getAllTasks()
    {
        $conn = connect();

        //write query for all tasks
        $sql = 'SELECT * FROM tasks ORDER BY created_at DESC';

        //make query and get results
        $results = mysqli_query($conn, $sql);

        //fetch the resulting rows as an array
        $tasks = mysqli_fetch_all($results, MYSQLI_ASSOC);

        //free results from memory
        mysqli_free_result($results);

        closeConnection($conn);

        return $tasks;
    }

    function addTask($time, $whatHappend, $howItWent)
    {
        $conn = connect();

        $time = mysqli_real_escape_string($conn, $time);
        $whatHappend = mysqli_real_escape_string($conn, $whatHappend);
        $howItWent = mysqli_real_escape_string($conn, $howItWent);
        
        //create sql
        $sql = "INSERT INTO tasks(time, whatHappend, howItWent) VALUE('$time', '$whatHappend', '$howItWent')";

        //save to db and check
        if(mysqli_query($conn, $sql)) {
            // success
            header('Location: index.php');
        }
        else {
            //error
            echo 'query error: ' . mysqli_error($conn);
        }

        closeConnection($conn);
    }

    function getTasksByDate($day)
    {
        $conn = connect();

        //write query for all tasks
        $sql = "SELECT * FROM tasks WHERE created_at 
                BETWEEN '$day 00:00:00' AND '$day 23:59:59' 
                ORDER BY created_at DESC";
        
        //make query and get results
        $results = mysqli_query($conn, $sql);

        //fetch the resulting rows as an array
        $tasks = mysqli_fetch_all($results, MYSQLI_ASSOC);

        closeConnection($conn);

        return $tasks;
    }

    function getTaskDataFromId($id)
    {
        $conn = connect();

        //write query for all tasks
        $sql = "SELECT * from tasks where id='".$id."'";
        
        //make query and get results
        $results = mysqli_query($conn, $sql);

        //fetch the resulting rows as an array
        $tasks = mysqli_fetch_all($results, MYSQLI_ASSOC);

        closeConnection($conn);

        return $tasks;
    }

    function editTask($id, $time, $whatHappend, $howItWent)
    {
        $conn = connect();
        
        //create sql
        $sql = "UPDATE tasks SET time='".$time."', whatHappend='".$whatHappend."', howItWent='".$howItWent."' where id='".$id."'";

        //save to db and check
        if(mysqli_query($conn, $sql)) {
            // success
            header('Location: index.php');
        }
        else {
            //error
            echo 'query error: ' . mysqli_error($conn);
        }

        closeConnection($conn);
    }

    function deleteTask($id)
    {
        $conn = connect();
        
        //create sql
        $sql = "DELETE FROM tasks WHERE `tasks`.`id` = $id";

        //save to db and check
        if(mysqli_query($conn, $sql)) {
            // success
            header('Location: index.php');
        }
        else {
            //error
            echo 'query error: ' . mysqli_error($conn);
        }

        closeConnection($conn);
    }

    function getFirstDate()
    {
        $conn = connect();

        //write query for all tasks
        $sql = 'SELECT created_at FROM tasks ORDER BY created_at LIMIT 1';
        
        //make query and get results
        $results = mysqli_query($conn, $sql);

        //fetch the resulting rows as an array
        $firstDate = mysqli_fetch_all($results, MYSQLI_ASSOC);

        closeConnection($conn);

        if(empty($firstDate))
        {
            return '';
        }
        else
        {
            $firstDateString = (new DateTime($firstDate[0]['created_at']))->format('Y-m-d');
            return $firstDateString;
        }
    }

    function getLastDate()
    {
        $conn = connect();

        //write query for all tasks
        $sql = "SELECT created_at FROM tasks ORDER BY created_at DESC LIMIT 1";
        
        //make query and get results
        $results = mysqli_query($conn, $sql);

        //fetch the resulting rows as an array
        $lastDate = mysqli_fetch_all($results, MYSQLI_ASSOC);

        closeConnection($conn);

        if(empty($lastDate))
        {
            return '';
        }
        else
        {
            $lastDateString = (new DateTime($lastDate[0]['created_at']))->format('Y-m-d');
            return $lastDateString;
        }
    }

?>