<?php
/**
 * Displays header site
 *
 * @package WordPress
 * @subpackage Helfe
 * @since 1.0.0
 */
?>
<nav id="site-navigation" class="main-navigation navbar navbar-expand-lg navbar-light bg-light" aria-label="<?php esc_attr_e( 'Top Menu', 'helfe' ); ?>">
<?php if ( has_custom_logo() ) : ?>
	<div class="site-logo"><?php the_custom_logo(); ?></div>
<?php endif; ?>
<?php $blog_info = get_bloginfo( 'name' ); ?>
<?php if ( ! empty( $blog_info ) ) : ?>
	<?php if ( is_front_page() && is_home() ) : ?>
		<a class="site-title navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
	<?php else : ?>
		<a class="navbar-brand site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
	<?php endif; ?>
<?php endif; ?>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>
<?php if ( has_nav_menu( 'menu-1' ) ) : ?>
	<?php
	$args = [
		'theme_location'	=> 'menu-1',
		'container'			=> 'div',
		'container_class'	=> 'collapse navbar-collapse justify-content-end',
		'container_id'		=> 'navbarSupportedContent',
		'items_wrap'		=> '<ul id="%1$s" class="navbar-nav mr-auto %2$s">%3$s</ul>',
		'add_li_class'		=> 'nav-item'
	];
	function add_additional_class_on_li($classes, $item, $args) {
		if(isset($args->add_li_class)) {
			$classes[] = $args->add_li_class;
		}
		return $classes;
	}
	add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

	function add_additional_class_on_a( $atts, $item, $args ) {
		$class = 'nav-link'; // or something based on $item
		$atts['class'] = $class;
		return $atts;
	}
	add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);

	wp_nav_menu($args);
	?>
<?php endif; ?>
</nav><!-- #site-navigation -->
<?php if ( has_nav_menu( 'social' ) ) : ?>
	<nav class="social-navigation nav justify-content-end" aria-label="<?php esc_attr_e( 'Social Links Menu', 'helfe' ); ?>">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'social',
				'menu_class'     => 'social-links-menu',
				'link_before'    => '<span class="screen-reader-text">',
				'link_after'     => '</span>',
				'depth'          => 1,
			)
		);
		?>
	</nav><!-- .social-navigation -->
<?php endif; ?>
