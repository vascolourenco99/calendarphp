<?php

  include './util/saveDays.php';


  function showCalendar($month, $year, $firstDayOfWeek, $monthDays, $daysOfTheWeek, $filename) {

    showMonthAndYear($month, $year);
    
    echo '<table cellspacing="16" cellpadding="16" align="center">';
        showDaysOfTheWeek($daysOfTheWeek);
        showDays($firstDayOfWeek, $monthDays, $filename);   
    echo "</table>";
  }



  function showMonthAndYear($month, $year){
    echo '<h2 align="center">';
    echo "{$month}/{$year}";
    echo "</h2>";
  }



  function showDaysOfTheWeek($days){
    echo "<thead>";
        echo "<tr>"; 
            foreach($days as $day) {
                echo "<td>{$day}</td>";
            }
        echo "</tr>"; 
    echo "</thead>";
  }



  function showDays($firstDayOfWeek, $monthDays, $filename) {

    $markedDays = saveDays($filename);
    $dayOfMonth = 1;
    $currentDay = date("j");


    echo "<tbody>";


        for ($row = 1; $row <= 6; $row++) {
            echo "<tr>";
        
                // Create columns for the calendar
                for ($col = 1; $col <= 7; $col++) {
                    // Check if the current day is valid
                    if (($row == 1 && $col < $firstDayOfWeek) || ($dayOfMonth > $monthDays)) {
                        echo "<td>&nbsp;</td>";
                    } else {
                        // Check if the current day is marked
                        $isMarked = in_array($dayOfMonth, $markedDays);
            
                        $class = $isMarked ? "marked" : "";
                        
                        $action = $class ? "deleteDay" : "addDay";
                        $button = $class ? 'Del' : 'Add';

                        $today = $dayOfMonth == $currentDay ? "today" : "";

                        // Create a form field for the current day
                        echo "<td class='$class' id={$today}> $dayOfMonth";
                        echo "<br>";
                            echo "<form method='POST'>";
                                echo "<input type='hidden' name='{$action}' value='$dayOfMonth'>";
                                echo "<input type='submit' value='{$button}' >";
                            echo "</form>";
                        echo "</td>";
            
                        // Increment the current day
                        $dayOfMonth++;
                    }
                }
        
            echo "</tr>";
        }

    echo "</tbody>";
        
  }
?>