<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

        endwhile; // End of the loop.
        
        echo "<h1>Nos dernières conférences</h1>";

        /* The 2nd Query (without global var) */
        
        $args2 = array(
            "category_name" => "conference"
        );
        $query2 = new WP_Query( $args2 );
        $CatID = get_the_category($query2->post->ID);

        echo "<h1>". category_description($CatID[0]). "</h1>";
        // The 2nd Loop
        while ( $query2->have_posts() ) {
            $query2->the_post();

            echo '<div class= "globalConteneur">';

                echo the_post_thumbnail(null, "thumbnail");

                echo '<div>'; 
                    echo '<li>' . get_the_title( $query2->post->ID ) . " - " . get_the_Date() . '</li>';
                    echo '<p>' . get_the_excerpt() . '</p>';
                echo '</div>';

            echo '</div>';

        }
        
        // Restore original Post Data
        wp_reset_postdata();


        echo "<h1>Nos dernières nouvelles</h1>";

        // The Query
        $args = array(
            "category_name" => "nouvelle",
            "posts_per_page" => 5,
            "orderby" => "date",
            "order" => "DESC"
        );
        $query1 = new WP_Query( $args );
        
        // The Loop
        echo '<div class="ConteneurNouvelles">';
        while ( $query1->have_posts() ) {
            $query1->the_post();
            echo '<h4>' . get_the_title() . '</h4>';
            echo the_post_thumbnail(null, "thumbnail");

        }
        echo '</div>';
        
        /* Restore original Post Data 
        * NB: Because we are using new WP_Query we aren't stomping on the 
        * original $wp_query and it does not need to be reset with 
        * wp_reset_query(). We just need to set the post data back up with
        * wp_reset_postdata().
        */
        wp_reset_postdata();
        
        ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
