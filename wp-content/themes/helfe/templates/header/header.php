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
<?php else : ?>
	<?php if ( ! empty( $blog_info ) ) : ?>
		<?php if ( is_front_page() && is_home() ) : ?>
			<a class="site-title navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		<?php else : ?>
			<a class="navbar-brand site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>
<?php $blog_info = get_bloginfo( 'name' ); ?>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu,#social_menu" aria-controls="main_menu" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>
<?php if ( has_nav_menu( 'primary' ) ) : ?>
	<?php
	$args = [
		'theme_location' => 'primary',
		'menu_class'     => 'primary-menu',
		'container'			=> 'div',
		'container_class'	=> 'collapse navbar-collapse justify-content-end',
		'container_id'		=> 'main_menu',
		'items_wrap'		=> '<ul class="navbar-nav %2$s">%3$s</ul>',
		'walker' => new Helfe_Walker_Menu()
	];
	wp_nav_menu($args);
	?>
<?php endif; ?>
</nav>
<!-- #site-navigation -->
