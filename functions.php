<?php
function setting_cookie() {

  if (isset($_POST['settheme'])){

   $settheme = $_POST['settheme'];
     setcookie('theme', $settheme, time()+(86400 * 30), '/');
     header('Location: ' . $_SERVER['HTTP_REFERER']);
     }

}
add_action( 'init', 'setting_cookie' );

require('includes/post_types.php');
require('includes/taxonomies.php');
require('includes/add_widgets.php');
require('includes/add_menu.php');


function addthemesupport(){
    //add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image', 'link' ) );
    add_theme_support('title-tag');
    add_theme_support( 'post-thumbnails' );
    require('includes/media_size.php');
}


add_action( 'after_setup_theme', 'addthemesupport' );

//read existing cookie to set theme or create new one
if (isset($_COOKIE['settheme'])) {
  $settheme = $_COOKIE['settheme'];
} else {
  $settheme = "";
}



//basic style sheet:
$handle = "ellenbrage";
$src = get_template_directory_uri() . "/css/main.css";
$deps = null;
$ver = null;
$media = "all";
wp_register_style( $handle, $src, $deps, $ver, $media );


//extra style sheet:
$handle2 = "theme";

if(isset($_COOKIE['theme'])) {
  $theme = ($_COOKIE['theme']);
} else {
  $theme ='standard';
}
$src2 = get_template_directory_uri() . "/css/".$theme.".css";
$deps2 = null;
$ver2 = null;
$media2 = "all";
wp_register_style( $handle2, $src2, $deps2, $ver2, $media2 );

//load both of the style sheets
function mytheme_enqueue_style() {
    wp_enqueue_style( 'ellenbrage', get_stylesheet_uri() );
    wp_enqueue_style( 'theme', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_style' );




//to make menu items change when active

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}
?>
