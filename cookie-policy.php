<?php
/*
 * Template Name: Cookies
 */
?>

<?php get_header(); ?>

<div id='cookies'>

<?php
if( have_posts() ) {
   while ( have_posts() ) {
     the_post();


     ?><h1><?php the_field('cookieheading');?></h1><?php
     ?><h3><?php the_field('introtext');?></h3><?php
     ?><p><?php the_field('cookielist');?></p><?php

    }
  }
?>

</div><!--end of page specific tag-->

<?php get_footer(); ?>
