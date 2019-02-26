<?php
function theme_enqueue_styles() {

    $parent_style = 'parent-style';
    //wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
    wp_enqueue_script( 'socy-special', get_stylesheet_directory_uri() . '/js/socy-main.js', array('jquery'), true );
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
add_filter('widget_text', 'do_shortcode');

//function to call first uploaded image in functions file
function main_image() {
$files = get_children('post_parent='.get_the_ID().'&post_type=attachment
&post_mime_type=image&order=desc');
  if($files) :
    $keys = array_reverse(array_keys($files));
    $j=0;
    $num = $keys[$j];
    $image=wp_get_attachment_image($num, 'large', true);
    $imagepieces = explode('"', $image);
    $imagepath = $imagepieces[1];
    $main=wp_get_attachment_url($num);
		$template=get_template_directory();
		$the_title=get_the_title();
    print "<img src='$main' alt='$the_title' class='frame' />";
  endif;
}

//VCU BRAND BAR
function wpb_adding_scripts() {
wp_register_script('vcu_branding', 
    '//branding.vcu.edu/bar/academic/latest.js', array(), '1.0', true);
wp_enqueue_script('vcu_branding');
}

add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' ); 

//if logged in admin bar padding 

function pad_for_admin(){
    if ( is_admin_bar_showing() ) {
   echo 'style="padding-top: 22px"';
    } else {
        return;
    }
}