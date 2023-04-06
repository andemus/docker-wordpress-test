<?php
/** @noinspection PhpUndefinedFunctionInspection */
if (!defined('WP_DEBUG_LOG')) {
  define('WP_DEBUG_LOG', getenv_docker('WORDPRESS_DEBUG_LOG', 1));
}

add_action('phpmailer_init', function ($phpmailer) {
  $phpmailer->Host = getenv_docker('MAILHOG_HOST', 'mailhog');
  $phpmailer->Port = getenv_docker('MAILHOG_PORT_SMTP', 1025);
  $phpmailer->IsSMTP();
});
add_filter('wp_mail_from', fn() => getenv_docker('WORDPRESS_MAIL_FROM', 'wordpress@sender.tld'));
//add_action( 'wp_mail_failed', function ( $wp_error ) {
//	return error_log( print_r( $wp_error, true ) );
//}, 10, 1 );