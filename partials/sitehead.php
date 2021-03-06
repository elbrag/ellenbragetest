<header>
    <nav class='main-nav'>

      <div id='logocontainer'>
        <a href="<?php echo home_url();?>"><div id='logo' class='svg'></div></a>
      </div>
        <div id='menu-symb' onclick="openMenu(this)" title="Menu">
          <span class='top'></span>
          <span class='mid'></span>
          <span class='bottom'></span>
        </div>
      </div>

      <div class='main-menu'>

        <div class='lang_items'>
          <div class='switch_container'>
                  <?php $languages = pll_the_languages(array('raw'=>1));
                  foreach($languages as $lang) {
                    ?>
                    <?php

                    if ($lang[slug] == 'en') {
                      $setlang = 'en_GB';
                    } elseif ($lang[slug] == 'sv') {
                      $setlang = 'sv_SE';
                    }

                     ?>

                        <a class='<?php
                        if (get_locale() == $setlang) {
                          echo 'active';
                        } ?>'
                        href='<?php echo $lang[url]; ?>' id='<?php echo $lang[slug]; ?>'>
                          <button class='lang_item'>
                              <?php echo $lang[slug]; ?>
                          </button>
                        </a>

                    <?php
                  }
                  ?>

          </div>
        </div>

        <?php wp_nav_menu( array('menu' => 'Menu', 'container' => '', 'link_before' => '', 'after' => '', 'items_wrap' => '<ul class="main-ul">%3$s</ul>' )); ?>


      </div>

    </nav>

</header>

<main>
