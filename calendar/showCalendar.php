<?php

  include './util/saveDays.php';


  function showCalendar($month, $year, $firstDayOfWeek, $monthDays, $daysOfTheWeek, $filename) {

    showMonthAndYear($month, $year);
    
    echo '<table cellspacing="16" cellpadding="16" align="center">';
        showDaysOftheWeek($daysOfTheWeek);
        showDays($firstDayOfWeek, $monthDays, $filename);   
    echo "</table>";
  }



  function showMonthAndYear($month, $year){
    echo '<h2 align="center">';
    echo "{$month}/{$year}";
    echo "</h2>";
  }



  function showDaysOftheWeek($days){
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
    $isMarked = true;
    $currentDay = 1;


    echo "<tbody>";


        for ($row = 1; $row <= 6; $row++) {
            echo "<tr>";
        
                // Create columns for the calendar
                for ($col = 1; $col <= 7; $col++) {
                    // Check if the current day is valid
                    if (($row == 1 && $col < $firstDayOfWeek) || ($currentDay > $monthDays)) {
                        echo "<td>&nbsp;</td>";
                    } else {
                        // Check if the current day is marked
                        $isMarked = in_array($currentDay, $markedDays);
            
                        // Add the 'marked' class if the day is marked
                        $class = $isMarked ? "marked" : "";
                        $action = $class ? "deleteDay" : "addDay";
                        $button = $class ? 'Delete' : 'Add';
                        // Create a form field for the current day
                        echo "<td class='$class'>$currentDay";
                        echo "<br>";
                            echo "<form method='POST'>";
                                echo "<input type='hidden' name='{$action}' value='$currentDay'>";
                                echo "<input type='submit' value='{$button}' >";
                            echo "</form>";
                        echo "</td>";
            
                        // Increment the current day
                        $currentDay++;
                    }
                }
        
            echo "</tr>";
        }

    echo "</tbody>";
        
  }
?>