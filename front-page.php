<?php

get_header();

if (have_posts()) :
    while (have_posts()) : the_post();

        the_content();

endwhile;

else :
    echo '<p>No content found.</p>';

endif;

// create custom loop
$spiralPosts = new WP_Query( array( 'cat' => 5 ) );

if ($spiralPosts->have_posts()) :

    ?><h2>Spiral Posts</h2><?php

    while ($spiralPosts->have_posts()) : $spiralPosts->the_post(); ?>

        <h3><?php the_title(); ?></h3>

    <?php endwhile;

    else :

endif;
wp_reset_postdata();

get_footer();

?>
