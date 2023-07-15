<?php
  function modal(){
    echo "<form  method='POST'>";
      echo '<div class="modal">';
          echo '<div class="modal-content">';
          
            echo  '<div class="modal-header">';
              echo  '<h2>Hours:</h2>';
              echo "<input type='time' name='addHour'>";
            echo  '</div>';

            echo  '<div class="modal-body">';
              echo "<input type='hidden' name='dayOfMonth' id='modalDay' required>";
              echo "<input type='text' name='addEvent' placeholder='Write your event...'>";
              echo "<input type='hidden' name='extraInput' value='1'>";
            echo  '</div>';

            echo  '<div class="modal-footer">';
              echo "<button name='closeModal' value='deleteEvent' onClick='closeForm()'>Close</button>";
              echo "<button type='submit' name='submit' value='addEvent'>Add Event</button>";
            echo  '</div>';
          echo  '</div>';
      echo   '</div>';
    echo "</form>";

  }
?>