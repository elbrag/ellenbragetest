<?php
/*
 * Template Name: Contact
 */
?>

<?php get_header(); ?>


<?php
if( have_posts() ) {
   while ( have_posts() ) {
     the_post();
     ?>
        <div id='contact'>

    <section class='contact_text'>

     <p><?php the_field('main_text')?></p>

   </section>
   <section class='contact_form'>
     <?php


     if (get_locale() == 'en_GB') {
          echo do_shortcode( '[contact-form-7 id="60" title="Contact form"]' );
      } elseif (get_locale() == 'sv_SE') {
           echo do_shortcode( '[contact-form-7 id="72" title="Contact form SE"]' );
       }

    ?>
    </section>
        </div><!--end of page specific tag-->
    <?php

   }
}
?>


<?php get_footer(); ?>
