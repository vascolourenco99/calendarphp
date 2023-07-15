<?php

    if (!function_exists('saveDaysEvents')) {
        function saveDaysEvents($filename){
            $daysAndEvents = [];

            if (isset($_POST['submit'])) {

                if ($_POST['submit'] === 'addEvent') {
                    
                    $dayOfMonth = $_POST['dayOfMonth'];
                    $eventText = $_POST['addEvent'];
                    $eventHour = $_POST['addHour'];
                    $event = $_POST['extraInput'];
                
                    $daysAndEvents = file_exists($filename) ? unserialize(file_get_contents($filename)) : [];
                
                    $daysAndEvents[$dayOfMonth] = [
                        'eventText' => $eventText,
                        'eventHour' => $eventHour,
                        'quantity' => $event
                    ];
                
                    file_put_contents($filename, serialize($daysAndEvents));

                } elseif (isset($_POST['submit']) && $_POST['submit'] === 'deleteEvent') {
                
                    $deleteDay = $_POST['deleteDay'];

                    $daysAndEvents = unserialize(file_get_contents($filename));
        
                    if (isset($daysAndEvents[$deleteDay])) {

                        unset($daysAndEvents[$deleteDay]);
                        
                        file_put_contents($filename, serialize($daysAndEvents));
                    }
                }
            } 

            return $daysAndEvents;
        }
    }
?>