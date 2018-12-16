<div class="wrapper checkmark greyscale first-only">
  <div class="event-name">
    Winter Adventure 2017
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
      <td class="cell<?php echo (in_array("folk-dancing",$enrolled) ? " enrolled" : "") ?>">
        <div class="title">
          Folk Dancing
        </div>
        <div class="leader">
          Patricia
        </div>
      </td>
      <td class="cell"></td>
      <td class="cell">
        <div class="mini-1<?php echo (in_array("song-parody-a-days-1-2",$enrolled) ? " enrolled" : "") ?>">
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
        <div class="mini-1<?php echo (in_array("song-parody-b-days-3-4",$enrolled) ? " enrolled" : "") ?>">
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
      <td class="cell"></td>
      <td class="cell">
        <div class="mini-1<?php echo (in_array("improv-1-2",$enrolled) ? " enrolled" : "") ?>">
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
        <div class="mini-2<?php echo (in_array("joy-of-movement",$enrolled) ? " enrolled" : "") ?>">
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
      <td class="cell<?php echo (in_array("childrens-program",$enrolled) ? " enrolled" : "") ?>">
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
        <div class="mini-1<?php echo (in_array("drum-circle-\"a\"-days-1-2",$enrolled) ? " enrolled" : "") ?>">
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
        <div class="mini-2<?php echo (in_array("drum-circle-\"b\"-days-3-4",$enrolled) ? " enrolled" : "") ?>">
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
      <td class="cell<?php echo (in_array("small-scenes",$enrolled) ? " enrolled" : "") ?>">
        <div class="title">
          Small Scenes
        </div>
        <div class="leader">
          Glenn
        </div>
      </td>
      <td class="cell">

      </td>
      <td class="cell<?php echo (in_array("art-and-mindfulness-days-1-2",$enrolled) ? " enrolled" : "") ?>">
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
      <td class="cell<?php echo (in_array("play-leadership-training",$enrolled) ? " enrolled" : "") ?>">
        <div class="title">
          Play Leadership Training
        </div>
        <div class="leader">
          Howard
        </div>
      </td>
      <td class="cell<?php echo (in_array("live-with-the-end-in-mind-days-3-4",$enrolled) ? " enrolled" : "") ?>">
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
      <td class="cell<?php echo (in_array("cooperative-childrens-program",$enrolled) ? " enrolled" : "") ?>">
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
        <div class="mini-1<?php echo (in_array("active-games-days-1-2",$enrolled) ? " enrolled" : "") ?>">
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
        <div class="mini-2<?php echo (in_array("string-swing-days-3-4",$enrolled) ? " enrolled" : "") ?>">
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
      <td class="cell<?php echo (in_array("beatlesing-days-3-4",$enrolled) ? " enrolled" : "") ?>">
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
      <td class="cell<?php echo (in_array("safe-conversations-days-1-2",$enrolled) ? " enrolled" : "") ?>">
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
        <div class="mini-1<?php echo (in_array("greeting-cards-days-1-2",$enrolled) ? " enrolled" : "") ?>">
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
        <div class="mini-2<?php echo (in_array("mobiles-days-3-4",$enrolled) ? " enrolled" : "") ?>">
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
      <td class="cell<?php echo (in_array("adventure-games-theater",$enrolled) ? " enrolled" : "") ?>">
        <div class="title">
          Adventure<br>Game Theater
        </div>
        <div class="leader">
          Isaac and Sharon
        </div>
      </td>
      <td class="cell"></td>
      <td class="cell<?php echo (in_array("childrens-program",$enrolled) ? " enrolled" : "") ?>">
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