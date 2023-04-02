<?php
/** @noinspection PhpUndefinedFunctionInspection */
if ( ! defined( 'WP_DEBUG_LOG' ) ) {
	define( 'WP_DEBUG_LOG', true );
}

add_action( 'phpmailer_init', function ( $phpmailer ) {
$phpmailer->Host = 'mailhog';
$phpmailer->Port = 1025;
$phpmailer->IsSMTP();
} );
add_filter('wp_mail_from', fn() => 'wordpress@sender.tld');
//add_action( 'wp_mail_failed', function ( $wp_error ) {
//	return error_log( print_r( $wp_error, true ) );
//}, 10, 1 );