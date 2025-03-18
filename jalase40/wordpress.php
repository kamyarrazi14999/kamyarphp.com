
<?php
#function.php
// Disable WordPress version

// Use plugins like WPDK and WPCS to use the functions below

// Remove WordPress version from the head
remove_action('wp_head', 'wp_generator');

// Disable XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

// Disable REST API
add_filter('rest_enabled', '__return_false');

// Require authentication for REST API
add_filter('rest_authentication_required', '__return_true');

// Disable WordPress emojis
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

// Disable WordPress embeds
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('rest_api_init', 'wp_oembed_register_route');
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
remove_filter('pre_oembed_result', 'wp_filter_pre_oembed_result', 10);

// Disable WordPress canonical URLs
remove_action('wp_head', 'rel_canonical');

// Disable WordPress shortlinks
remove_action('wp_head', 'wp_shortlink_wp_head');

// Disable WordPress wlwmanifest
remove_action('wp_head', 'wlwmanifest_link');

// Disable WordPress RSD
remove_action('wp_head', 'rsd_link');

// Disable WordPress pingback
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('rest_api_init', 'wp_oembed_register_route');
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
remove_filter('pre_oembed_result', 'wp_filter_pre_oembed_result', 10);
?>
