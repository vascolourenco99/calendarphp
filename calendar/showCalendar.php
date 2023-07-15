<?php

  include './util/saveDays.php';
  include './components/modal.php';

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

    if (file_exists($filename)){
      $daysAndEvents = unserialize(file_get_contents($filename));
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

                        if (isset($daysAndEvents[$dayOfMonth]['quantity'])) {
                          $eventQuantity = $daysAndEvents[$dayOfMonth]['quantity'];
                        } else {
                            $eventQuantity = '';
                        }

  
                        echo "<td id='{$today}' class='{$class}'>";
                          
                          echo "<div class='top-day'>";
                            echo "<span class='font'>$dayOfMonth</span>";
                            echo "<span class='font'>$eventQuantity</span>";
                          echo "</div>";
  
                          echo "<div class='bottom-day'>";
                            if ($dayOfMonth >= $currentDay) {
                              echo "<button name='open' onclick='openForm($dayOfMonth)'>+</button>";
                            }
                          echo "</div>";
  
                        echo "</td>";
  
                        // Increment the current day
                        $dayOfMonth++;
                    }
                }
          
              echo "</tr>";
        }
  
      echo "</tbody>";
      
    }

  }

?>