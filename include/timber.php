<?php 
// TIMBER related
// let users know the timber is not loaded
if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
			echo '<div class="error"><p><a href="http://upstatement.com/timber/">Timber</a> not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		} );
	return;
}
// set default *.twig location
Timber::$dirname = 'twig';

// add Timber helpers
function add_to_twig($twig) {
    /* this is where you can add your own fuctions to twig */
    $function = new Twig\TwigFunction('enqueue_script', function ($handle) {
        // register it elsewhere
        wp_enqueue_script( $handle);
    });
    $twig->addFunction($function);

    $function = new Twig\TwigFunction('enqueue_style', function ($handle) {
        // register it elsewhere
        wp_enqueue_style( $handle);
    });
    $twig->addFunction($function);
    return $twig;
}
add_filter('timber/twig', 'add_to_twig');