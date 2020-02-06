<?php

 
/**
 * top level menu
 */
function _2046__options_page() {
	 // add top level menu page
	 add_menu_page(
		 'Nastavení', // (string) (Required) The text to be displayed in the title tags of the page when the menu is selected
		 'Nastavení', // (string) (Required) The text to be used for the menu.
		 'edit_posts', // (string) (Required) The capability required for this menu to be displayed to the user.
		 '_2046_',
		 '_2046__options_page_html' // (callable) (Optional) The function to be called to output the content for this page.
	 );
}
/**
 * register our _2046__options_page to the admin_menu action hook
 */
add_action( 'admin_menu', '_2046__options_page' );



/**
 * @internal never define functions inside callbacks.
 * these functions could be run multiple times; this would result in a fatal error.
 */
 
/**
 * custom option and settings
 */
function _2046__settings_init() {
	// add_option('_2046__options_email_0','');
	// add_option('_2046__options_email_1','');

	 // register a new setting for "_2046_" page

	 // register a new section in the "_2046_" page
	 add_settings_section(
	 	'_2046_admin_section',
	 	__( 'E-maily na které se odešle kopie odeslaného formuláře (oddělené čárkou).', '_2046_' ),
	 	'_2046__section_developers_cb',
	 	'_2046_' 
	 );

	 // register a new field in the "_2046__section_developers" section, inside the "_2046_" page
	 add_settings_field( 
	 	'_2046_email_0', // global field id
		__( 'e-maily', 'textdomain' ), // title
		'_2046_email_field', // (callable) (Required) Function that fills the field with the desired form inputs. The function should echo its output.
		'_2046_', // (string) (Required) The slug-name of the settings page on which to show the section (general, reading, writing, ...).
		'_2046_admin_section',
		array( // The $args
            '_2046_email_0' // Should match Option ID
        )  
	 );
	//  add_settings_field( 
	//  	'_2046_email_1', // global field id
	// 	 __( 'e-mail', 'textdomain' ), // title
	// 	'_2046_email_field', // (callable) (Required) Function that fills the field with the desired form inputs. The function should echo its output.
	// 	'_2046_', // (string) (Required) The slug-name of the settings page on which to show the section (general, reading, writing, ...).
	// 	'_2046_admin_section',
	// 	array( // The $args
 //            '_2046_email_1' // Should match Option ID
 //        )
	// );

    $args = array(
	    'type' => 'string', 
	    'sanitize_callback' => 'sanitize_text_field',
	    'default' => NULL,
	);
    register_setting( '_2046_', '_2046_email_0', $args ); 
    // register_setting( '_2046_', '_2046_email_1', $args ); 
}

/**
 * register our _2046__settings_init to the admin_init action hook
 */
add_action( 'admin_init', '_2046__settings_init' );

/**
 * custom option and settings:
 * callback functions
 */

// developers section cb

// section callbacks can accept an $args parameter, which is an array.
// $args have the following keys defined: title, id, callback.
// the values are defined at the add_settings_section() function.
function _2046__section_developers_cb( $args ) {
	 ?>
	 <p id="<?php echo esc_attr( $args['id'] ); ?>"></p>
	 <?php
}


// field callbacks can accept an $args parameter, which is an array.
// $args is defined at the add_settings_field() function.
// wordpress has magic interaction with the following keys: label_for, class.
// the "label_for" key value is used for the "for" attribute of the <label>.
// the "class" key value is used for the "class" attribute of the <tr> containing the field.
// you can add custom key value pairs to be used inside your callbacks.
function _2046_email_field( $args ) {
	$option = get_option($args[0]);
    echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}


/**
 * top level menu:
 * callback functions
 */
function _2046__options_page_html() {
	// check user capabilities
	if ( ! current_user_can( 'edit_posts' ) ) {
		 return;
	}

	 // add error/update messages

	 // check if the user have submitted the settings
	 // wordpress will add the "settings-updated" $_GET parameter to the url
	 if ( isset( $_GET['settings-updated'] ) ) {
	 	// add settings saved message with the class of "updated"
	 	add_settings_error( '_2046__messages', '_2046__message', __( 'Settings Saved', '_2046_' ), 'updated' );
	 }

	 // show error/update messages
	 settings_errors( '_2046__messages' );
	 ?>
	 <div class="wrap">
	 	<h1>
	 		<?php echo esc_html( get_admin_page_title() ); ?>
	 	</h1>
		 <form action="options.php" method="post">
			 <?php
			 // output security fields for the registered setting "_2046_"
			 settings_fields( '_2046_' );
			 // output setting sections and their fields
			 // (sections are registered for "_2046_", each field is registered to a specific section)
			 do_settings_sections( '_2046_' );
			 // output save settings button
			 submit_button( 'Save Settings' );
			 ?>
		 </form>
	 </div>
	 <?php
}
