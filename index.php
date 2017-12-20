<?php require "partials/functions.php" ?>

<!doctype html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Class Schedules</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="57x57" href="https://www.ecrs.org/wp-content/themes/Divi-ECRS/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="https://www.ecrs.org/wp-content/themes/Divi-ECRS/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="https://www.ecrs.org/wp-content/themes/Divi-ECRS/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="https://www.ecrs.org/wp-content/themes/Divi-ECRS/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="https://www.ecrs.org/wp-content/themes/Divi-ECRS/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="https://www.ecrs.org/wp-content/themes/Divi-ECRS/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="https://www.ecrs.org/wp-content/themes/Divi-ECRS/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="https://www.ecrs.org/wp-content/themes/Divi-ECRS/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="https://www.ecrs.org/wp-content/themes/Divi-ECRS/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="https://www.ecrs.org/wp-content/themes/Divi-ECRS/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://www.ecrs.org/wp-content/themes/Divi-ECRS/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="https://www.ecrs.org/wp-content/themes/Divi-ECRS/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://www.ecrs.org/wp-content/themes/Divi-ECRS/favicon/favicon-16x16.png">

    <link href="https://fonts.googleapis.com/css?family=Mukta+Mahee|Oswald:700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="dist/css/style.css">
  </head>
  <body>
    <?php
      require "partials/header.php";
    ?>
    <div class="class-schedules active-content">
      <?php
        $lists = getLists("data/csv/lists.csv");
        highlight_string("<?php\n\$data =\n" . var_export($lists, true) . ";\n?>");
        $attendees = json_decode(file_get_contents("data/combined.json"));
        $limitedEnrollment = getLimitedClasses(json_decode(file_get_contents("data/limits.json"),true));
        $staffLists = array();
        $nameMap = array();

        foreach ($attendees as $index => $attendee) {
          $name = $attendee->Name->FirstAndLast;
          $enrolled = getClasses($attendee,$limitedEnrollment,$nameMap);

          require "partials/schedule.php";
        }
      ?>
    </div>
    <div class="staff-lists">
      <?php require "partials/staff-list.php"; ?>
    </div>

    <script
    src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
    crossorigin="anonymous"></script>

    <script src="dist/js/concat.js" type="text/javascript" charset="utf-8" async defer></script>

    <script src="https://use.fontawesome.com/9598abd703.js"></script>
  </body>
</html>