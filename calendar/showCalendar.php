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
            echo "<td class='day-cell font'>{$day}</td>";
          }
      echo "</tr>"; 
    echo "</thead>";
  }



  function showDays($firstDayOfWeek, $monthDays, $filename) {

    saveDaysEvents($filename);

    $dayOfMonth = 1;
    $currentDay = date("j");

    echo "<tbody>";

        // Create rows for the calendar
        for ($row = 1; $row <= 6; $row++) {
            echo "<tr>";
        
                // Create columns for the calendar
                for ($col = 1; $col <= 7; $col++) {
                    // Check if the current day is valid
                    if (($row == 1 && $col < $firstDayOfWeek) || ($dayOfMonth > $monthDays)) {

                      echo "<td id='empty'>&nbsp;</td>";
                    } else {

                        // Check if the current day is marked
                        $today = $dayOfMonth == $currentDay ? "today" : "";
                        $class = $dayOfMonth < $currentDay ? "marked" : "";

                        echo "<td id='{$today}' class='{$class}'>";

                          echo "<div class='top-day'>";
                            echo "<span class='font'>$dayOfMonth</span>";
                          echo "</div>";

                          echo "<form method='POST'>";
                            echo "<input type='hidden' name='dayOfMonth' value='$dayOfMonth' required>";
                            echo "<input type='text' name='addEvent' placeholder='Write your event...' required>";
                          
                            echo "<div class='bottom-day'>";
                              echo "<input type='time' name='addHour' required>";
                              echo "<button type='submit' name='submit' value='addEvent'>Add Event</button>";
                            echo "</div>";

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