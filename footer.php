          </main>
          <footer class='mainfooter'>

            <?php

  //theme slider area---------------------//

  // $themeList = array("theme_1", "theme_2", "theme_3", "theme_4");
  // $themeNames = array("Swiss", "Up north", "King Of Reptiles", "Wavemaker");


  // if (isset($_COOKIE['theme'])) {
  //   $settheme = ($_COOKIE['theme']);
  //
  //   for ($x = 0; $x <= count($themeList); $x++) {
  //
  //     if ($themeList[$x] == $settheme) {
  //
  //       $prev = $themeList[$x-1];
  //       $next = $themeList[$x+1];
  //
  //       for ($y = 0; $y <= count($themeNames); $y++) {
  //
  //         if ($y == $x) {
  //           $themename = $themeNames[$y];
  //           $prevname = $themeNames[$y-1];
  //           $nextname = $themeNames[$y+1];
  //
  //           if ($prevname == "") {
  //             $prevname = 'Mural';
  //           } elseif($nextname == "") {
  //             $nextname = 'Mural';
  //           }
  //         }
  //       }
  //     }
  //   }
  // } else {
  //   $themename = 'Mural';
  //   $prev = $themeList[3];
  //   $next = $themeList[0];
  //   $prevname = $themeNames[3];
  //   $nextname = $themeNames[0];
  // }
  //
   ?>

      <span class='next'>
        <form method='POST' action=''>

            <input type='hidden' name='settheme' value='<?php echo $next ?>'></input>
                <input type='submit' onclick=slidenext(); name='next' value=''></input>

        </form>
      </span>

  <!--theme slider end-------------------->

          </footer>


          <?php
          $scripts = get_template_directory_uri() . "/js/scripts.js";
          $masonry = get_template_directory_uri() . "/js/masonry.pkgd.min.js";
          ?>

          <!-- <script type="text/javascript" src="<?php echo $masonry;?>"></script> -->
          <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
          <script type="text/javascript" src="<?php echo $scripts;?>"></script>
          <?php wp_footer() ?>
      </body>

</html>
