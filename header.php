<!DOCTYPE html>
<html>

  <head>
    <title>Ellen Brage – Graphic designer &amp; Web developer</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Ellen, Brage">
    <meta name="description" content="Graphic designer and Web developer based in Sweden. To get an idea about what I do, go to Work and browse my previous projects. Or you could pick a different theme.">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,300i,400,400i,600,600i,800,800i" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/xfy8eum.css">
    <link href="https://fonts.googleapis.com/css?family=Alegreya:400,400i,500,500i,700,700i,800,800i,900,900i|Roboto+Mono:300,300i,400,400i,500,500i,700,700i|Source+Serif+Pro:400,600,700|Kanit:400,700,800,900|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Passion+One:400,700,900|Hind:300,400,500,600,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script> -->

    <?php
    $src = get_template_directory_uri() . "/js/masonry.pkgd.min.js";
    ?>

    <script src="<?php echo $src ?>"></script>

    <?php wp_head(); ?>

    <meta name="theme-color" content="
    <?php
    if ($_COOKIE['theme'] == 'theme_1') {
      echo "#fff";
    } elseif ($_COOKIE['theme'] == 'theme_2') {
      echo "#d0ecf2";
    } elseif ($_COOKIE['theme'] == 'theme_3') {
      echo "#fcaaa1";
    } elseif ($_COOKIE['theme'] == 'theme_4') {
      echo "#fbfbfb";
    } else {
      echo "#fff951";
    }
    ?>
    " />
  </head>

  <?php
  /*code to figure out user's theme choice, uncomment to use this solution*/

  // if (isset($_COOKIE['theme'])) {
  //   $theme = $_COOKIE['theme'];
  // } else {
  //   $theme = "standard";
  // }

  ?>

  <!-- <body id='<?php //echo $theme ?>'> -->
  <body>

    <div id='loading'>
      <div id='wheel'>
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>

    <?php require("partials/sitehead.php"); ?>
