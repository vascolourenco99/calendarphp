<?php

    function saveDays($filename){
        $markedDays = [];

        if (isset($_POST['addDay'])) {
            $day = $_POST['addDay'];
            $markedDays = file_exists($filename) ? file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
            
            if (!in_array($day, $markedDays)) {
                $markedDays[] = $day;
                file_put_contents($filename, implode(PHP_EOL, $markedDays));
            }
        } elseif (isset($_POST['deleteDay'])) {
            $day = $_POST['deleteDay'];
            $markedDays = file_exists($filename) ? file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
            
            $index = array_search($day, $markedDays);
            if ($index !== false) {
                unset($markedDays[$index]);
                file_put_contents($filename, implode(PHP_EOL, $markedDays));
            }
        }

        return $markedDays;
    }
?>