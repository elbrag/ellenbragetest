<?php
/*
 * Template Name: About
 */
?>

<?php get_header(); ?>



<?php
if( have_posts() ) {
   while ( have_posts() ) {
     the_post();
     ?>
     <div id='about'>


<!--Section 1-->
        <section>

          <div id='imageblock'>

            <?php
            $full = 'full';
            $large = 'large';

            $image1 = get_field('image_1');

            $sizedimage1 = $image1['sizes'][ $large ];
            $width = $image1['sizes'][ $large . '-width' ];
            $height = $image1['sizes'][ $large . '-height' ];

            if ($image1) {
              ?>
              <img class='image' src='<?php echo $sizedimage1;?>'>
             <?php }
            ?>

            

            <div class='graphic_elem2'>
            </div>


          </div>
            <div id='textblock'>

             <p><?php the_field('text_1');?></p>


             <br />

             <h2><?php the_field('heading_2'); ?></h2>

             <p><?php the_field('text_2');?></p>

             <h2><?php the_field('heading_3'); ?></h2>

             <p><?php the_field('text_3');?></p>

           </div>

        </section>

   </div><!--end of page specific tag-->
    <?php
   }
}
?>



<?php get_footer(); ?>
