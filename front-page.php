<?php
/*
 * Template Name: Home
 */

get_header(); ?>
<script>
document.querySelector('body').className = 'body_home';

</script>

<?php
if ($_COOKIE['theme'] == '') {
  ?>
  <script>
  console.log('hi');
  $(document).click(function(){
      $('.graphic_elem').addClass('clicked');

      setTimeout(function(){
        $('.graphic_elem').removeClass('clicked');
      }, 200);
  });
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

          <div class='graphic_elem'>

            <?php
            if ($_COOKIE['theme'] == "theme_1") {
                          ?>

                          <div class='header1_box'>
                            <h1 class='fill'>Ellen Brage</h1>
                          </div>

                          <div class='top'>
                              <div class='topleft'></div>
                              <div class='topright'></div>
                          </div>

                          <div class='middle'></div>

                          <div class='bottom'>
                              <div class='bottomleft'></div>
                              <div class='bottomright'></div>
                          </div>

                          <div class='text_box'>
                            <p>Graphic designer and web developer based in Sweden<br />
                            Check out my <a href='/work'>work</a>
                            Find me on <a target='_blank' href='http://www.linkedin.com/in/ellen-brage-66b02314b
            '>Linkedin</a>
                            Send me an <a href="mailto:hello@ellenbrage.com">e-mail</a></p>
                          </div>


                          <?php
                        }
                        ?>


          </div>

          <?php
          if ($_COOKIE['theme'] == "theme_3") {
            ?>

          <div id='textbox'>
              <div class='header1_box'>
                  <h1 class='fill'>Ellen Brage</h1>
              </div>
              <div class='titles_box'>
                  <p class='title'><?php echo $title1 ." ". "&amp;" . " " . $title2?></p>
              </div>
          </div>

          <?php
          }
          ?>

        </div>



        <?php
        if (($_COOKIE['theme'] != "theme_1") && ($_COOKIE['theme'] != "theme_3")) {
          ?>

        <div id='textbox'>
            <div class='header1_box'>
                <h1 class='fill'>Ellen Brage</h1>
            </div>
            <div class='titles_box'>
                <p class='title'><?php echo $title1 ." ". "&amp;" . " " . $title2?></p>
            </div>
        </div>

        <?php
        }
        ?>





  </section>
  <?php
    }
  }
?>

<?php get_footer(); ?>
