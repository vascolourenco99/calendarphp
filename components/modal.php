<?php
  function modal(){
    echo "<form class='modal' method='POST'>";
      echo "<div class='modal-container'>";
  
        echo "<div class='top-modal'>";
          echo "<input type='hidden' name='dayOfMonth' id='modalDay' value='' required>";
          echo "<input type='text' name='addEvent' placeholder='Write your event...'>";
        echo "</div>";
  
        echo "<div class='mid-modal'>";
          echo "<input type='time' name='addHour'>";
        echo "</div>";
  
        echo "<div class='bottom-modal'>";
          echo "<button name='closeModal' value='deleteEvent' onClick='closeForm()'>Close</button>";
          echo "<button type='submit' name='submit' value='addEvent'>Add Event</button>";
        echo "</div>";
  
      echo "</div>";
    echo "</form>";
  }
?>