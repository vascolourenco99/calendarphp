<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Calendário</title>
    </head>
    <body>
        <?php 
        include './calendar/showCalendar.php'; 
        include './calendar/showEvents.php'; 

        $month = date("n");
        $year = date("Y");
        $monthDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $firstDayOfWeek = date("N", strtotime("01-$month-$year"));
        $daysOfTheWeek = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"); 
        $filename = "./db/eventsDays.txt";

        echo "<div class='calendar-container'>";
        
            echo "<div class='calendar'>";
                showCalendar($month, $year, $firstDayOfWeek, $monthDays, $daysOfTheWeek, $filename);
            echo "</div>";

            echo "<div class='events'>";
                echo "<h1>Events:</h1>";
                showEvents($filename);
            echo "</div>";
            
        echo "</div>";
        
        ?>
    </body>
</html>



