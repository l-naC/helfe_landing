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
	<footer id="colophon" class="site-footer page-footer footer mt-auto py-3">
		<div id="footer_helfe">
			<div class="site-info container-fluid text-center text-md-left row">
				<?php $blog_info = get_bloginfo( 'name' ); ?>
				<div class="col-md-6 mb-md-0 mb-4 align-self-start">
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
				<div class="col-md-6 mb-md-0 mb-4 align-self-end">
					<?php if ( has_nav_menu( 'social' ) ) : ?>
						<nav class="footer-navigation list-unstyled" aria-label="<?php esc_attr_e( 'Social Menu', 'helfe' ); ?>">
							<p>Suivez-nous sur nos réseaux sociaux : </p>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'social',
									'container'			=> 'div',
									'container_class'	=> 'footer-social menu-social',
									'container_id'		=> 'footer-social',
									'menu_class'     	=> 'social-links-footer menu-items social-footer',
									'menu_id' 			=> 'footer-social-items',
									'link_before'   => '<span class="screen-reader-text">',
									'link_after'    => '</span>',
									'fallback_cb'	=> '',
									'depth'         => 1,
								)
							);
							?>
						</nav><!-- .social-navigation -->
					<?php endif; ?>
				</div>
			</div><!-- .site-info -->
			<div class="footer-copyright text-center py-3">© Copyright
				<a class="site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				All Rights Reserved
			</div>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->
<div>
	<?php wp_footer(); ?>
</div>

</body>
</html>
