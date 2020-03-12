<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
 
}

function wpm_add_google_fonts() {
 
    wp_enqueue_style( 'wpm-google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat&display=swap', false ); 
    }
     
    add_action( 'wp_enqueue_scripts', 'wpm_add_google_fonts' );

/*function extraire_evenement($query){
if(!is_front_page() && $query->is_category('evenement'))
    {
        $query->set('year',2020);
        //$query->set('monthnum_in',1,2,3);
        $query->set('posts_per_page',-1);
        $query->set('orderby','date');
        $query->set('order','asc');
    }
}
add_action('pre_get_posts', 'extraire_evenement');*/