<?php 

    function validate($time, $whatHappend, $howItWent)
    {
        $errors = array('time' => '', 'whatHappend' => '', 'howItWent' => '');
        
        if(empty($time))
        {
            $errors['time'] = 'Du måste lägga till en tid';
        }
        else if(!filter_var($time, FILTER_VALIDATE_INT)) 
        {
            $errors['time'] = 'Tiden måste vara i siffror';
        }

        if(empty($whatHappend)) {
            $errors['whatHappend'] = 'Du måste lägga till vad som hände';
        }

        if(empty($howItWent)) {
            $errors['howItWent'] = 'Du måste lägga till hur det gick';
        }

        return $errors;
    }

?>