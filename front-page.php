<?php
/*
 * Template Name: Home
 */

get_header(); ?>
<script>
document.querySelector('header').className = 'home';

</script>

<?php
if ($_COOKIE['theme'] == '') {
  ?>
  <script>
  // console.log('hi');
  // $(document).click(function(){
  //     $('.graphic_elem').addClass('clicked');
  //
  //     setTimeout(function(){
  //       $('.graphic_elem').removeClass('clicked');
  //     }, 200);
  // });
  </script>
<?php }
 ?>
<div id='preload'></div>
<?php
if( have_posts() ) {
   while ( have_posts() ) {
     the_post();

     //changing texts depending on set language
               if (get_locale() == 'sv_SE') {
                 $title1 = 'Grafisk designer';
                 $title2 = 'Webbutvecklare';
               }//end of swe language check
               if (get_locale() == 'en_GB') {
                 $title1 = 'Graphic designer';
                 $title2 = 'Web developer';
                }//end of eng language check
     /////////////////////////////////////////////////

     ?>

  <section id='frontpage'>
        <div id='front_background'>
          <div class='name-svg'></div>
          <!-- <div class='graphic_elem'></div> -->
              <h1 class='name'>Ellen Brage</h1>
          </div>
  </section>
  <!-- <section id='belowfold'>
    <h2>Graphic designer & Web developer</h2>
  </section> -->
  <?php
    }
  }
?>

<?php get_footer(); ?>
