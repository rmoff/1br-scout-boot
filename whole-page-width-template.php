<?php /* Template Name: Full Width */ ?>

<?php
get_header();
b4st_main_before();
?>

<?php get_template_part('loops/banner'); ?>

<style>
	.full-width{ width: 100vh !important;}
	.full-width>img{ width: 100vh !important;}
</style>

<main id="site-main" class="container">
	<div class="row">

		<div id="content" role="main">
			<?php get_template_part('loops/page-content'); ?>
		</div><!-- /#content -->

	</div>

	</div><!-- /.row -->
</main><!-- /.container -->

<?php
b4st_main_after();
get_footer();
?>
