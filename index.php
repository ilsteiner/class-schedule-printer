<?php require "partials/functions.php" ?>

<!doctype html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Mukta+Mahee|Oswald:700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <?php
      require "partials/header.php";

      $attendees = json_decode(file_get_contents("data/combined.json"));

      foreach ($attendees as $index => $attendee) {
        $name = $attendee->Name->FirstAndLast;
        $enrolled = getClasses($attendee);

        require "partials/schedule.php";
      }
    ?>

    <script
    src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
    crossorigin="anonymous"></script>

    <script src="js/script.js" type="text/javascript" charset="utf-8" async defer></script>
  </body>
</html>