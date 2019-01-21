<?php
/*
 * Template Name: Work
 */
?>

<?php get_header(); ?>

<div id='work'>

  <section id='category_area'>


<!--keeping checkbox checked: https://stackoverflow.com/questions/12541419/php-keep-checkbox-checked-after-submitting-form -->

<form method='POST' action=''>

  <?php
    $terms = get_terms(array('taxonomy' => 'project-category', 'hide_empty' => true));

            foreach ($terms as $value) { ?>
            <label class="categories">

             <input type="checkbox" name="checkbox[]"
               <?php
               if ((in_array($value->name, $_POST['checkbox'])) || (!isset($_POST['checkbox']))) echo "checked='checked'";
               ?>
               value='<?php echo $value->name ?>'>
            </input>
            <span class='checkbox'></span>
            <?php echo $value->name ?>
            </label>
          <?php }

//changing text of button depending on set language
          if (get_locale() == 'sv_SE') {
            $filtervalue = 'Filtrera';
          }//end of swe language check
          if (get_locale() == 'en_GB') {
            $filtervalue = 'Filter';
           }//end of eng language check
/////////////////////////////////////////////////
          ?>



          <input type='submit' id='submit' value=<?php echo $filtervalue ?>></input>
</form>
    </section>

  <?php

        $args = array(
          'post_type' => 'project',
          'posts_per_page' => -1
        );

        $query = new WP_Query( $args );
  ?>

  <section id='work_grid'>


    <button id="topButton" title="Go to top">
       &uarr;
     </button>

<?php
if( $query->have_posts() ) {
   while ( $query->have_posts() ) {
     $query->the_post();
     ?>

       <?php

// get the category that each post belongs to so we can compare it to what is checked above

       foreach (get_the_terms(get_the_ID(), 'project-category') as $cat) {

         $category = $cat->name;

       }


       if (isset($_POST['checkbox']) && !empty($_POST['checkbox'])) {

         foreach ($_POST['checkbox'] as $check) {
            if ($check == $category) {
              ?>
              <div class='grid_project'>

                <a href='<?php the_permalink(); ?>'>

                  <?php

                  $large_thumbnail = 'large_thumbnail';

                   $thumbimage = get_field('thumb');

                   $thumb_resized = $thumbimage['sizes'][ $large_thumbnail ];

                   ?>

                   <div class='work_grid_image' style='background-image: url("<?php echo $thumb_resized ;?>");'></div>


                   <?php
                   echo "<p>";
                   the_field('project_title');
                   echo "</p>";

                   ?>
                </a>

              </div>

              <?php
            }
         }

//default: all posts showing. Also all checkboxes are checked (see the <input> above)

       } elseif (!isset($_POST['checkbox'])) {
         ?>
         <div class='grid_project'>

           <a href='<?php the_permalink(); ?>'>

             <?php

             $large_thumbnail = 'large_thumbnail';

              $thumbimage = get_field('thumb');

              $thumb_resized = $thumbimage['sizes'][ $large_thumbnail ];

              ?>

              <div class='work_grid_image' style='background-image: url("<?php echo $thumb_resized ;?>");'>

              <?php

              echo "<p>";
              the_field('project_title');
              echo "</p>";

              ?>
              </div>
           </a>

         </div>
         <?php
       }
   }
}
?>

</section>

</div><!--end of page specific tag-->


<?php get_footer(); ?>
