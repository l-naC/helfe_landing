<?php
/**
 * Header du thème
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package WordPress
 * @subpackage Helfe
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html class="h-100" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<body <?php body_class('d-flex flex-column h-100') ?>>
<?php wp_body_open(); ?>
<div id="page" class="site flex-shrink-0">
  <header>
    <?php get_template_part( 'templates/header/header' ); ?>
  </header>
