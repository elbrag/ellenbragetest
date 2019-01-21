<?php get_header(); ?>


<?php
if (get_locale() == 'sv_SE') {?>
  <script>
  document.getElementById('menu-item-37').className += ' active';
  </script>
<?php
}//end of swe language check
if (get_locale() == 'en_GB') {
  ?>
  <script>
  document.getElementById('menu-item-36').className += ' active';
  </script>
  <?php
 }//end of eng language check
?>


<?php

$value = 1;

if( have_posts() ) {

   while ( have_posts() ) {
     the_post();

      ?>

      <button id="topButton" title="Go to top">
        &uarr;
      </button>

        <div id='single'>


          <section id='singleinfo'>
          <?php

          $cats = wp_get_object_terms( $post->ID, 'project-category' );
          foreach ($cats as $cat) {

            ?>
            <p class='single_category'>
            <?php
            echo "/".$cat->name."/";
            ?>
            </p>
            <?php

          }
          ?>

              <h1>
               <?php
                the_field('project_title');
                ?>
              </h1>

              <div class='single_category'>
              <p class='project_brief'>
               <?php

               //changing text of buttons/headings depending on set language
                         if (get_locale() == 'sv_SE') {
                           echo "<strong>Gjordes </strong> ";
                         }//end of swe language check
                         if (get_locale() == 'en_GB') {
                           echo "<strong>Made in </strong> ";
                          }//end of eng language check
               /////////////////////////////////////////////////
                the_field('year');
                ?>
              </p>
              <p class='project_brief'>
               <?php

               //changing text of buttons/headings depending on set language
                         if (get_locale() == 'sv_SE') {
                           echo "<strong>med </strong> ";
                         }//end of swe language check
                         if (get_locale() == 'en_GB') {
                           echo "<strong>with </strong> ";
                          }//end of eng language check
               /////////////////////////////////////////////////

                the_field('main_tools');
                ?>
              </p>
              <p class='project_brief'>
                <?php

                if(get_field('cooperation')) {

                  //changing text of buttons/headings depending on set language
                            if (get_locale() == 'sv_SE') {
                              echo "<strong>i samarbete med </strong>";
                            }//end of swe language check
                            if (get_locale() == 'en_GB') {
                              echo "<strong>in cooperation with </strong>";
                             }//end of eng language check
                  /////////////////////////////////////////////////

                  if(get_field('cooperation_link')){
                    echo "<a target='_blank' href=";
                    the_field('cooperation_link');
                    echo ">";
                  }

                  the_field('cooperation');

                  if(get_field('cooperation_link')){
                    echo "</a>";
                  }

                }

                ?>

                <?php

                if(get_field('cooperation_2')) {

                  //changing text of buttons/headings depending on set language
                            if (get_locale() == 'sv_SE') {
                              echo "och ";
                            }//end of swe language check
                            if (get_locale() == 'en_GB') {
                              echo "and ";
                             }//end of eng language check
                  /////////////////////////////////////////////////


                  if(get_field('cooperation_link_2')){
                    echo "<a target='_blank' href=";
                    the_field('cooperation_link_2');
                    echo ">";
                  }



                  the_field('cooperation_2');

                  if(get_field('cooperation_link')){
                    echo "</a>";
                  }

                }

                ?>

              </p>
              </div>

              <?php

              $video_mp4 =  get_field('mp4_video'); // MP4 Field Name
              $video_webm  = get_field('webm_video'); // WEBM Field Name
              $video_flv =  get_field('flv_video'); // FLV Field Name
              $video_poster  = get_field('poster_image'); // Poster Image Field

              if (!$video_mp4 && !$video_webm && !$video_flv) {
                $large_thumbnail = 'large_thumbnail';
                 $thumbimage = get_field('thumb');
                 $thumb_resized = $thumbimage['sizes'][ $large_thumbnail ];
                 ?>

                 <div class='single_top' style='background-image: url("<?php echo $thumb_resized ;?>");'></div>
                 <?php
              }
              ?>


              <div class='singletext' <?php if ($video_mp4 || $video_webm || $video_flv) { echo "id='vid'"; }  ?>>
                <p class='single_description' id='desc'>
                 <?php
                  the_field('project_description');
                  ?>
                </p>
                <span id='readmore'>Read more</span>
              </div>


         </section>

         <?php
         //https://speckyboy.com/html5-video-wordpress-custom-fields/
         //if there's a video in the post
         // Get the Video Fields
          $video_mp4 =  get_field('mp4_video'); // MP4 Field Name
          $video_webm  = get_field('webm_video'); // WEBM Field Name
          $video_flv =  get_field('flv_video'); // FLV Field Name
          $video_poster  = get_field('poster_image'); // Poster Image Field Name
          // Build the  Shortcode
          $attr =  array(
          'mp4'      => $video_mp4,
          'webm'     => $video_webm,
          'flv'      => $video_flv,
          'poster'   => $video_poster,
          'preload'  => 'auto'
          );

         if ($video_mp4 || $video_webm || $video_flv) {
           // Display the Shortcode
           ?><div id='videocontainer'><?php
           echo wp_video_shortcode(  $attr );
           ?></div><?php
         }

          ?>

         </div><!--end of page specific tag-->

         <?php
         $images = acf_photo_gallery('single_imgs', $post->ID);

          if ($images) {
            ?>
            <section id='singleimages'>
              <?php


              if( count($images) ) {
                foreach($images as $image){
                  $id = $image['id']; // The attachment id of the media
                  $title = $image['title']; //The title
                  $caption= $image['caption']; //The caption
                  $full_image_url= $image['full_image_url']; //Full size image url
                  $thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
                  $url= $image['url']; //Goto any link when clicked
                  $target= $image['target']; //Open normal or new tab
                  $alt = get_field('photo_gallery_alt', $id); //Get the alt which is a extra field (See below how to add extra fields)
                  $class = get_field('photo_gallery_class', $id); //Get the class which is a extra field (See below how to add extra fields)
                  ?>
                  <a class='gall_img' href='<?php echo $full_image_url ?>'><img class='single_img' src='<?php echo  $full_image_url ?>' /></a>
                  <?php
                }
              }

              ?>


            </section>

            <?php
          } ?>

    <?php
    }
   }
   ?>
   <div id='single'>
     <?php
//get ID for this project
$projectid = get_the_ID();

//check how many posts we can find of each category
  $terms = get_the_terms( $post->ID , 'project-category' );
  foreach ( $terms as $term ) {
    $numberofposts = $term->count;
  }

/*if there's only one project in the category we can't suggest similar projects, so we'll simply suggest "more" projects, meaning we'll display all projects instead of projects from the same category. */

if ($numberofposts > 1) {
  //get the projects from the same category as this one
  $categories = get_the_terms(get_the_ID(), 'project-category');

  foreach($categories as $category) {
    wp_reset_query();
    $args = array(
      'project' => 'custom_post_type',
      'tax_query' => array(
        array(
            'taxonomy' => 'project-category',
            'field' => 'slug',
            'terms' => $category->slug,
            'posts_per_page' => -1
        ),
      ),
    );
  }

} else {
  $args = array(
    'post_type' => 'project',
    'posts_per_page' => -1
  );
}

$query = new WP_Query( $args );
?>

<section class='similar_projects'>

<?php

$count = 0;

//changing text of buttons/headings depending on set language
          if (get_locale() == 'sv_SE') {
            $headingvalue1 = 'Liknande projekt';
            $headingvalue2 = 'Fler projekt';
            $buttonvalue = 'Se alla projekt';
          }//end of swe language check
          if (get_locale() == 'en_GB') {
            $headingvalue1 = 'Similar projects';
            $headingvalue2 = 'More projects';
            $buttonvalue = 'Browse all projects';
           }//end of eng language check
/////////////////////////////////////////////////

  if( $query->have_posts() ) {

    if ($numberofposts > 1) {
      ?>
      <h2><?php echo $headingvalue1 ?></h2>
      <?php
    } else {
      ?>
      <h2><?php echo $headingvalue2 ?></h2>
      <?php
    }
    ?>
    <div class='similar_thumbs_area'>

    <?php
     while ( $query->have_posts() ) {
       $query->the_post();

       //get the ids for the similar projects
       $sim_id = get_the_ID();

         //fetch 3 projects of this category that aren't this one
         if ( ($projectid != $sim_id) && ($count < 3) ) {

           $count++;
         ?>

         <?php

         $sim_thumbnail = 'large_thumbnail';

          $thumbimage = get_field('thumb');

          $thumb_resized = $thumbimage['sizes'][ $sim_thumbnail];

          ?>


         <a class='similar_thumb' href='<?php the_permalink(); ?>'>
             <div class='thumb_img' style='background-image: url("<?php echo $thumb_resized ;?>");'>
            <?php

                echo "<p>";
                the_field('project_title');
                echo "</p>";

            ?>
             </div>
          </a>

        <?php
          }
    }
  }
  ?>
    </div>

<a class='browse_all' href='/work'><?php echo $buttonvalue ?></a>

</section>

</div><!--end of page specific tag-->

<?php get_footer(); ?>
