<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous" async></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous" async></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" async></script>
	<?php wp_head(); ?>
	<?php extra_styles(); ?>
</head>

<body <?php body_class(); ?>>

	<?php b4st_navbar_before(); ?>

	<?php $options = get_option('scout_theme_options'); ?>

	<?php $brand_colour = get_text_light_dark($options['navColour'] ?? ''); ?>

	<nav id="site-navbar" class="navbar navbar-expand-lg navbar-<?php echo get_reverse_light_dark($brand_colour) ?> bg-scout-<?php echo (!empty($options['navColour']) ? $options['navColour'] : 'purple') ?> shadow-sm">
		<div class="container-fluid col-12 col-lg-11 col-xl-9">

			<?php if (function_exists('the_custom_logo')) {
				$custom_logo_id = get_theme_mod('custom_logo');
				$image = wp_get_attachment_image_src($custom_logo_id, 'full');
				$link = esc_url(home_url('/'));
				if (has_custom_logo()) {
					echo "<div><a href=\"$link\"><img class=\"navbar-brand-$brand_colour\" src=\"$image[0]\" style=\"max-height:65px; width:auto; height:auto;\"></a></div>";
				} else {
					echo "<a class=\"navbar-brand-$brand_colour\" href=\"";
					echo esc_url(home_url('/'));
					echo "\">";
					bloginfo('name');
					echo "</a>";
				}
			} ?>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse flex-wrap flex-row-reverse" id="navbarDropdown">

				<div id="nav-extras" class="d-none d-lg-flex flex-row-reverse">
					<!-- <?php b4st_navbar_search("ps-3"); ?> -->
					<?php navbar_quick_links(); ?>
					<?php b4st_navbar_profile("ps-3"); ?>
				</div>

				<?php
				wp_nav_menu(array(
					'theme_location'  => 'navbar',
					'container'       => false,
					'menu_class'      => '',
					'fallback_cb'     => '__return_false',
					'items_wrap'      => '<ul id="%1$s" class="navbar-nav navbar-large me-auto mt-2 mt-lg-0 d-none d-lg-flex flex-grow-1 %2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'          => new b4st_walker_nav_menu()
				));
				?>

				<?php
				wp_nav_menu(array(
					'theme_location'  => 'navbar',
					'container'       => false,
					'menu_class'      => '',
					'fallback_cb'     => '__return_false',
					'items_wrap'      => '<ul id="%1$s" class="navbar-nav navbar-small me-auto mt-2 mt-lg-0 d-flex d-lg-none %2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'          => new b4st_walker_nav_menu_mobile()
				));
				?>

			</div>

		</div>
	</nav>

	<?php b4st_navbar_after(); ?>