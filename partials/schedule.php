<div class="wrapper checkmark greyscale first-only">
  <div class="event-name">
    Winter Adventure 2018
  </div>
  <div class="name">
    <?php echo $name ?>
  </div>
  <table class="schedule">
    <tr class="rooms">
      <th class="cell"></th>
      <?php 
      $rooms = file("data/rooms.txt");

      foreach ($rooms as $index => $roomName) {
        echo "<th class='cell'>" . trim($roomName,"\n\r") . "</th>";
      }
      ?>
    </tr>
    <tr>
      <td class="cell time">8:00</td>
      <td class="cell full-width" colspan="7"><span class="bold dash-after">Breakfast</span>Dining Room</td>
    </tr>
    <tr>
      <td class="cell time">9:00-10:40</td>
      <td class="cell<?php echo (in_array("Folk Dancing",$enrolled) ? " enrolled" : "") ?>">
        <div class="title">
          Folk Dancing
        </div>
        <div class="leader">
          Patricia
        </div>
      </td>
      <td class="cell"></td>
      <td class="cell">
        <div class="mini-1<?php echo (in_array("Song Parody  \"A\" (days 1-2)",$enrolled) ? " enrolled" : "") ?>">
          <div class="title">
            Song Parody A
          </div>
          <div class="days">
            Days 1–2
          </div>
          <div class="leader">
            Josh and Rachael
          </div>
        </div>
        <div class="mini-2<?php echo (in_array("Song Parody \"B\" (days 3-4)",$enrolled) ? " enrolled" : "") ?>">
          <div class="title">
            Song Parody B
          </div>
          <div class="days">
            Days 3–4
          </div>
          <div class="leader">
            Josh and Rachael
          </div>
        </div>
      </td>
      <td class="cell<?php echo (in_array("Collage Journey Books",$enrolled) ? " enrolled" : "") ?>">
        <div class="title">
          Collage Journey Books
        </div>
        <div class="leader">
          Teri
        </div>
      </td>
      <td class="cell">
        <div class="mini-1<?php echo (in_array("Improv (days 1-2)",$enrolled) ? " enrolled" : "") ?>">
          <div class="title">
            Improv
          </div>
          <div class="days">
            Days 1–2
          </div>
          <div class="leader">
            Howard and Isaac
          </div>
        </div>
        <div class="mini-2<?php echo (in_array("Joy of Movement (days 3-4)",$enrolled) ? " enrolled" : "") ?>">
          <div class="title">
            Joy of Movement
          </div>
          <div class="days">
            Days 3–4
          </div>
          <div class="leader">
            Marko
          </div>
        </div>
      </td>
      <td class="cell"></td>
      <td class="cell<?php echo (in_array("Children's Program",$enrolled) ? " enrolled" : "") ?>">
        <div class="title">
          Children's<br>Program
        </div>
        <div class="leader">
          Tim
        </div>
      </td>
    </tr>
    <tr>
      <td class="cell time">10:50-12:30</td>
      <td class="cell">
        <div class="mini-1<?php echo (in_array("Drum Circle \"A\" (days 1-2)",$enrolled) ? " enrolled" : "") ?>">
          <div class="title">
            Drum Circle A
          </div>
          <div class="days">
            Days 1–2
          </div>
          <div class="leader">
            Dan
          </div>
        </div>
        <div class="mini-2<?php echo (in_array("Drum Circle \"B\"  (days 3-4)",$enrolled) ? " enrolled" : "") ?>">
          <div class="title">
            Drum Circle B
          </div>
          <div class="days">
            Days 3–4
          </div>
          <div class="leader">
            Dan
          </div>
        </div>
      </td>
      <td class="cell<?php echo (in_array("Small Scenes",$enrolled) ? " enrolled" : "") ?>">
        <div class="title">
          Small Scenes
        </div>
        <div class="leader">
          Glenn
        </div>
      </td>
      <td class="cell">

      </td>
      <td class="cell<?php echo (in_array("Art and Mindfulness (days 1-2)",$enrolled) ? " enrolled" : "") ?>">
        <div class="title">
          Art and Mindfulness
        </div>
        <div class="days">
          Days 1-2
        </div>
        <div class="leader">
          Catherine
        </div>
      </td>
      <td class="cell<?php echo (in_array("Play Leadership Training",$enrolled) ? " enrolled" : "") ?>">
        <div class="title">
          Play Leadership Training
        </div>
        <div class="leader">
          Howard
        </div>
      </td>
      <td class="cell<?php echo (in_array("Live with the End in Mind (days 3-4)",$enrolled) ? " enrolled" : "") ?>">
        <div class="title">
          Live With the End in Mind
        </div>
        <div class="days">
          Days 3-4
        </div>
        <div class="leader">
          Za
        </div>
      </td>
      <td class="cell<?php echo (in_array("Cooperative Children's Program",$enrolled) ? " enrolled" : "") ?>">
        <div class="title">
          Cooperative<br>Children's<br>Program
        </div>
        <div class="leader">
          Volunteers
        </div>
      </td>
    </tr>
    <tr>
      <td class="cell time">12:45</td>
      <td class="cell" colspan="7"><span class="bold dash-after">Lunch</span>Dining Room</td>
    </tr>
    <tr>
      <td class="cell time">1:30-3:35</td>
      <td class="cell" colspan="7"><span class="bold">Free Time Activities</span></td>
    </tr>
    <tr>
      <td class="cell time">3:45-5:45</td>

      <td class="cell">
        <div class="mini-1<?php echo (in_array("Active Games (days 1-2)",$enrolled) ? " enrolled" : "") ?>">
          <div class="title">
            Active Games
          </div>
          <div class="days">
            Days 1–2
          </div>
          <div class="leader">
            Jacquie
          </div>
        </div>
        <div class="mini-2<?php echo (in_array("String & Swing (days 3-4)",$enrolled) ? " enrolled" : "") ?>">
          <div class="title">
            String and Swing
          </div>
          <div class="days">
            Days 3–4
          </div>
          <div class="leader">
            Jacquie
          </div>
        </div>
      </td>
      <td class="cell<?php echo (in_array("Beatlesing (days 3-4)",$enrolled) ? " enrolled" : "") ?>">
        <div class="title">
          Beatlesing
        </div>
        <div class="days">
          Days 3-4
        </div>
        <div class="leader">
          Frank, Donna, David
        </div>
      </td>
      <td class="cell<?php echo (in_array("Safe Conversations (days 1-2)",$enrolled) ? " enrolled" : "") ?>">
        <div class="title">
          Safe Conversations
        </div>
        <div class="days">
          Days 1-2
        </div>
        <div class="leader">
          Kim
        </div>
      </td>
      <td class="cell">
        <div class="mini-1<?php echo (in_array("Greeting Cards (days 1-2)",$enrolled) ? " enrolled" : "") ?>">
          <div class="title">
            Greeting Cards
          </div>
          <div class="days">
            Days 1–2
          </div>
          <div class="leader">
            Charlotte
          </div>
        </div>
        <div class="mini-2<?php echo (in_array("Mobiles (days 3-4)",$enrolled) ? " enrolled" : "") ?>">
          <div class="title">
            Mobiles
          </div>
          <div class="days">
            Days 3–4
          </div>
          <div class="leader">
            Julie
          </div>
        </div>
      </td>
      <td class="cell<?php echo (in_array("Adventure Games Theater",$enrolled) ? " enrolled" : "") ?>">
        <div class="title">
          Adventure<br>Game Theater
        </div>
        <div class="leader">
          Isaac and Sharon
        </div>
      </td>
      <td class="cell"></td>
      <td class="cell<?php echo (in_array("Children's Program",$enrolled) ? " enrolled" : "") ?>">
        <div class="title">
          Children's<br>Program
        </div>
        <div class="leader">
          Tim
        </div>
      </td>
    </tr>
    <tr>
      <td class="cell time">6:00</td>
      <td class="cell full-width" colspan="7">
        <span class="bold dash-after">
          Dinner
        </span>
        Dining Room
      </td>
    </tr>
    <tr>
      <td class="cell time">7:30-10:00</td>
      <td class="cell full-width" colspan="7">
        <span class="bold">
          Evening Program
        </span>
        Barb with Josh and Rachael
        and
        <span class="bold">
          Evening Sing
        </span>
        with Allie
      </td>
    </tr>
    <tr>
      <td class="cell time">10:00</td>
      <td class="cell full-width" colspan="7">
        <span class="bold">
          Snacks
        </span>
        (followed by bedtime for some)
      </td>
    </tr>
    <tr>
      <td class="cell time">10:15-?</td>
      <td class="cell full-width" colspan="7">
        <span class="bold">
          Late Night Activities
        </span>
      </td>
    </tr>
  </table>
  <div class="updated">
    <?php 
      date_default_timezone_set('America/New_York');
      echo date("l, F jS Y") . " at " . date("g:i A T")
    ?>
  </div>
</div>