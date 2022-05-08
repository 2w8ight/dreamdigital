<?php
get_header();
?>

    <main class="single-blog-page">

		<?php
		while ( have_posts() ) :
			the_post();

			the_content();

		endwhile;
		?>

    </main>

<?php
get_footer();
