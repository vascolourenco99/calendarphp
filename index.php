<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Calendário</title>
    </head>
    <body>
        <?php 
        include './calendar/showCalendar.php'; 

        $month = date("n");
        $year = date("Y");
        $monthDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $firstDayOfWeek = date("N", strtotime("01-$month-$year"));
        $daysOfTheWeek = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"); 
        $filename = "./db/markedDays.txt";

        showCalendar($month, $year, $firstDayOfWeek, $monthDays, $daysOfTheWeek, $filename);
        ?>
    </body>
</html>



