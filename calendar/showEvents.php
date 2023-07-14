<?php

 include './util/saveDays.php';

    function showEvents($filename) {

        saveDaysEvents($filename);
   
        if (file_exists($filename)) {
            $daysAndEvents = unserialize(file_get_contents($filename));
            
            // sort events by date
            ksort($daysAndEvents);

            if(empty($daysAndEvents)) {

                echo "<div class='event-info'>";
                    echo "No events. ";
                echo "</div>";
            } else {
                foreach ($daysAndEvents as $day => $eventData) {
                    $eventText = $eventData['eventText'];
                    $eventHour = $eventData['eventHour'];
        
                    echo "<div class='event-info'>";
                        echo "day: $day<br>";
                        echo "Event: $eventText.<br>";
                        echo "Hour: $eventHour<br>";
                    echo "</div>";

                    echo "<form method='POST'>";
                        echo "<input type='hidden' name='deleteDay' value='$day'>";
                        echo "<input type='hidden' name='deleteEventText' value='$eventText'>";
                        echo "<input type='hidden' name='deleteEventHour' value='$eventHour'>";
                        echo "<button type='submit' name='submit' value='deleteEvent'>Delete Event</button>";
                    echo "</form>";
        
                    echo "<br>";
                    }
            }
        }
    }
?>