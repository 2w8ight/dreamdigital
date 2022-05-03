<?php
/*
Template Name: 404
*/
get_header();
?>

    <main id="primary" class="site-main">
        <div class="container-fluid max-width">
            <section class="error-404 not-found">
                <div class="page-content">
                    <h1><?php esc_html_e('404 Not Found', 'THEME_NAME') ?></h1>
                    <p><?php esc_html_e('It looks like nothing was found at this location.', 'THEME_NAME'); ?></p>
                </div><!-- .page-content -->
            </section><!-- .error-404 -->
        </div>
    </main><!-- #main -->

<?php
get_footer();
