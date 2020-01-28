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
<div class="container-fluid text-center text-md-left">
	<div class="row justify-content-center">
		<div class="col-md-3 mt-md-0 mt-3">
		<?php if ( has_custom_logo() ) : ?>
			<div class="site-logo"><?php the_custom_logo(); ?></div>
		<?php endif; ?>
		<?php $blog_info = get_bloginfo( 'name' ); ?>
		<?php if ( ! empty( $blog_info ) ) : ?>
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>
		<?php endif; ?>
		<?php
		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) :
			?>
				<p class="site-description">
					<?php echo $description; ?>
				</p>
		<?php endif; ?>
		</div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu" aria-controls="main_menu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="col-md-6 mt-md-0 mt-3">
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_class'     => 'main-menu collapse navbar-collapse',
						'items_wrap'     => '<ul id="%1$s" class="navbar-nav mr-auto %2$s">%3$s</ul>',
						)
					);
					?>
		<?php endif; ?>
		</div>
	</div>
</div>
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
