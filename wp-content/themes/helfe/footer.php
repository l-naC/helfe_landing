<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package WordPress
 * @subpackage Helfe
 * @since 1.0.0
 */

?>

</div><!-- #content -->
	<footer id="colophon" class="site-footer page-footer">
		<?php get_template_part( 'templates/footer/footer', 'widgets' ); ?>
		<div class="site-info container-fluid text-center text-md-left">
		<div class="row">
			<div class="col-md-6 mt-md-0 mt-3">
				<?php $blog_info = get_bloginfo( 'name' ); ?>
				<?php if ( ! empty( $blog_info ) ) : ?>
				<a class="site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<?php endif; ?>
			</div>
      		<hr class="clearfix w-100 d-md-none pb-3">
			<div class="col-md-3 mb-md-0 mb-3">
				<?php if ( has_nav_menu( 'footer' ) ) : ?>
					<nav class="footer-navigation list-unstyled" aria-label="<?php esc_attr_e( 'Footer Menu', 'helfe' ); ?>">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer',
								'menu_class'     => 'footer-menu',
								'depth'          => 1,
							)
						);
						?>
					</nav><!-- .footer-navigation -->
				<?php endif; ?>
			</div>
		</div><!-- .row -->
		</div><!-- .site-info -->
		<div class="footer-copyright text-center py-3">© 2019 Copyright:
			<a href="https://helfe.fr/"> Helfe </a>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->
<div>
	<?php wp_footer(); ?>
</div>

</body>
</html>
