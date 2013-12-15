<?php

remove_action('wp_head', 'wp_generator');

include 'lib/options.php';
$options = get_option('tucano_theme_options');

function new_excerpt_more( $more ) {
	return ' ...';
}

add_filter('excerpt_more', 'new_excerpt_more');

require 'lib/update.php';

$example_update_checker = new ThemeUpdateChecker(
	'tucano',
	'http://leonardl.de/themes/tucano/info.json'
);



?>