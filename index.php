<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GRE QUIZ</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
  <div class="row">
      <div class="columns small-12 heading">Gre Quiz</div>
  </div>
  <div class="row">

        <?php

        if (isset($_GET['list']))$list=$_GET["list"];
        if(!isset($list)) {
            echo "<div class='columns small-12 list'>";
            for ($i = 1; $i <= 11; $i++) {
                echo "<a href='/list" . $i . ".html'> List " . $i . "/</a>";
                if ($i == 6) {
                    echo "<br>";
                }
            }
        }
       ?>
    <script src="js/vendor/jquery.js"></script>
        <script>
        $(document).ready(function(){

          $("#group").click(function()
            {
                $("#group_name").fadeIn(1000);
            });
      });
    </script>
  </body>
</html>
