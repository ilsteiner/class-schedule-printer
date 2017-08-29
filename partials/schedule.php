<div class="wrapper">
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
      <td class="cell">
        <div class="mini-1<?php echo (array_key_exists("nia-dance-days-1-2",$enrolled) ? $enrolled['nia-dance-days-1-2'] == 'first' ? ' first' : ' second' : '') ?>">
          <div class="title">
            NIA
          </div>
          <div class="days">
            Days 1–2
          </div>
          <div class="leader">
            Judi & Marko
          </div>
        </div>
        <div class="mini-2<?php echo (array_key_exists("waltz-time-is-play-time",$enrolled) ? $enrolled['waltz-time-is-play-time'] == 'first' ? ' first' : ' second' : '') ?>">
          <div class="title">
            Waltz
          </div>
          <div class="days">
            Days 3–4
          </div>
          <div class="leader">
            Wesley
          </div>
        </div>
      </td>
      <td class="cell"></td>
      <td class="cell">
        <div class="mini-1<?php echo (array_key_exists("what-wants-to-come-next-in-your-life-days-1-2",$enrolled) ? $enrolled['what-wants-to-come-next-in-your-life-days-1-2'] == 'first' ? ' first' : ' second' : '') ?>">
          <div class="title">
            What's Next 1
          </div>
          <div class="days">
            Days 1–2
          </div>
          <div class="leader">
            Za
          </div>
        </div>
        <div class="mini-2<?php echo (array_key_exists("what-wants-to-come-next-in-your-life-days-3-4",$enrolled) ? $enrolled['what-wants-to-come-next-in-your-life-days-3-4'] == 'first' ? ' first' : ' second' : '') ?>">
          <div class="title">
            What's Next 2
          </div>
          <div class="days">
            Days 3–4
          </div>
          <div class="leader">
            Za
          </div>
        </div>
      </td>
      <td class="cell"></td>
      <td class="cell">
        <div class="mini-1<?php echo (array_key_exists("active-games-days-1-2",$enrolled) ? $enrolled['active-games-days-1-2'] == 'first' ? ' first' : ' second' : '') ?>">
          <div class="title">
            Games 1
          </div>
          <div class="days">
            Days 1–2
          </div>
          <div class="leader">
            Jacquie
          </div>
        </div>
        <div class="mini-2<?php echo (array_key_exists("improv-days-3-4",$enrolled) ? $enrolled['improv-days-3-4'] == 'first' ? ' first' : ' second' : '') ?>">
          <div class="title">
            Improv 2
          </div>
          <div class="days">
            Days 3–4
          </div>
          <div class="leader">
            Howard
          </div>
        </div>
      </td>
      <td class="cell<?php echo (array_key_exists("spoon-carving",$enrolled) ? $enrolled['spoon-carving'] == 'first' ? ' first' : ' second' : '') ?>">
        <div class="title">
          Spoon Carving
        </div>
        <div class="leader">
          Steve K
        </div>
      </td>
      <td class="cell<?php echo (array_key_exists("childrens-program",$enrolled) ? $enrolled['childrens-program'] == 'first' ? ' first' : ' second' : '') ?>">
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
        <div class="title<?php echo (array_key_exists("folk-dancing",$enrolled) ? $enrolled['folk-dancing'] == 'first' ? ' first' : ' second' : '') ?>">
          Folk Dancing
        </div>
        <div class="leader">
          Patricia
        </div>
      </td>
      <td class="cell<?php echo (array_key_exists("small-scenes",$enrolled) ? $enrolled['small-scenes'] == 'first' ? ' first' : ' second' : '') ?>">
        <div class="title">
          Small Scenes
        </div>
        <div class="leader">
          Frank B
        </div>
      </td>
      <td class="cell"></td>
      <td class="cell<?php echo (array_key_exists("mask-making",$enrolled) ? $enrolled['mask-making'] == 'first' ? ' first' : ' second' : '') ?>">
        <div class="title">
          Mask Making
        </div>
        <div class="leader">
          Teri & Julie
        </div>
      </td>
      <td class="cell">
        <div class="mini-1<?php echo (array_key_exists("improv-days-1-2",$enrolled) ? $enrolled['improv-days-1-2'] == 'first' ? ' first' : ' second' : '') ?>">
          <div class="title">
            Improv 1
          </div>
          <div class="days">
            Days 1–2
          </div>
          <div class="leader">
            Howard
          </div>
        </div>
        <div class="mini-2<?php echo (array_key_exists("active-games-days-3-4",$enrolled) ? $enrolled['active-games-days-3-4'] == 'first' ? ' first' : ' second' : '') ?>">
          <div class="title">
            Games 2
          </div>
          <div class="days">
            Days 3–4
          </div>
          <div class="leader">
            Jacquie
          </div>
        </div>
      </td>
      <td class="cell">
        <div class="mini-1<?php echo (array_key_exists("me-and-bobby-d-connecting-with-dylan-days-1-2",$enrolled) ? $enrolled['me-and-bobby-d-connecting-with-dylan-days-1-2'] == 'first' ? ' first' : ' second' : '') ?>">
          <div class="title">
            Bob Dylan
          </div>
          <div class="days">
            Days 1–2
          </div>
          <div class="leader">
            Frank & Donna M-S
          </div>
        </div>
        <div class="mini-2<?php echo (array_key_exists("story-games",$enrolled) ? $enrolled['story-games'] == 'first' ? ' first' : ' second' : '') ?>">
          <div class="title">
            Story Games
          </div>
          <div class="days">
            Days 3–4
          </div>
          <div class="leader">
            Robin
          </div>
        </div>
      </td>
      <td class="cell<?php echo (array_key_exists("cooperative-childrens-program",$enrolled) ? $enrolled['cooperative-childrens-program'] == 'first' ? ' first' : ' second' : '') ?>">
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
      <td class="cell" colspan="7"></td>
    </tr>
    <tr>
      <td class="cell time">1:30-3:35</td>
      <td class="cell" colspan="7"></td>
    </tr>
    <tr>
      <td class="cell time">3:45-5:45</td>
      <td class="cell<?php echo (array_key_exists("cultural-messages-in-games",$enrolled) ? $enrolled['cultural-messages-in-games'] == 'first' ? ' first' : ' second' : '') ?>">
        <div class="title">
          Cultural Messages<br>in Games
        </div>
        <div class="leader">
          Frank B & Karen
        </div>
      </td>
      <td class="cell"></td>
      <td class="cell">
        <div class="mini-1<?php echo (array_key_exists("corning-glass-adventure",$enrolled) ? $enrolled['corning-glass-adventure'] == 'first' ? ' first' : ' second' : '') ?>">
          <div class="title">
            Corning Glass
          </div>
          <div class="days">
            Days 1–2
          </div>
          <div class="leader">
            Donna
          </div>
        </div>
        <div class="mini-2<?php echo (array_key_exists("stepping-into-desire",$enrolled) ? $enrolled['stepping-into-desire'] == 'first' ? ' first' : ' second' : '') ?>">
          <div class="title">
            Desire
          </div>
          <div class="days">
            Days 3–4
          </div>
          <div class="leader">
            Betsy
          </div>
        </div>
      </td>
      <td class="cell">
        <div class="mini-1<?php echo (array_key_exists("puppet-making-days-1-2",$enrolled) ? $enrolled['puppet-making-days-1-2'] == 'first' ? ' first' : ' second' : '') ?>">
          <div class="title">
            Puppets 1
          </div>
          <div class="days">
            Days 1–2
          </div>
          <div class="leader">
            Mickey
          </div>
        </div>
        <div class="mini-2<?php echo (array_key_exists("puppet-making-days-3-4",$enrolled) ? $enrolled['puppet-making-days-3-4'] == 'first' ? ' first' : ' second' : '') ?>">
          <div class="title">
            Puppets 2
          </div>
          <div class="days">
            Days 3–4
          </div>
          <div class="leader">
            Mickey
          </div>
        </div>
      </td>
      <td class="cell<?php echo (array_key_exists("adventure-game-theater",$enrolled) ? $enrolled['adventure-game-theater'] == 'first' ? ' first' : ' second' : '') ?>">
        <div class="title">
          Adventure<br>Game Theater
        </div>
        <div class="leader">
          Isaac
        </div>
      </td>
      <td class="cell"></td>
      <td class="cell<?php echo (array_key_exists("childrens-program",$enrolled) ? $enrolled['childrens-program'] == 'first' ? ' first' : ' second' : '') ?>">
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
        (Debra w/ Cassie)
        <span class="bold">
          and Evening Sing
        </span>
        (Reed & Allie)
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