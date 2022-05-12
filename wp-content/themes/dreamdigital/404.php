<?php
/*
Template Name: 404
*/
get_header(); ?>
    <main class="error-page">
        <div class="error_wrap container">
            <section class="not-found">
                <h1><?php echo __( '404 Not Found', 'dreamdigital' ) ?></h1>
                <p><?php echo __( 'It looks like nothing was found at this location.', 'dreamdigital' ); ?></p>
            </section>
        </div>
    </main>
<?php get_footer();