<?php
if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page(
    [
      'page_title'  => 'Frontend',
      'menu_title'  => 'Frontend',
      'menu_slug'   => 'frontend-settings',
      'capability'  => 'edit_posts',
      'redirect'    => false,
      'icon_url' => 'dashicons-admin-network',
    ]
  );

  acf_add_options_sub_page(
    [
      'page_title'  => 'Footer',
      'menu_title'  => 'Footer',
      'parent_slug' => 'frontend-settings',
    ]
  );
  
}

/*
 * -----------------------------------------------------------------------------
 * Advanced Custom Fields Modifications
 * -----------------------------------------------------------------------------
 https://gist.github.com/courtneymyers/eb51f918181746181871f7ae516b428b
 https://gist.github.com/E-VANCE
*/
function PREFIX_apply_acf_modifications() {
?>
  <style>
    .acf-editor-wrap iframe {
      min-height: 0;
    }
  </style>
  <script>
    (function($) {
      // reduce placeholder textarea height to match tinymce settings (when using delay-setting)
      $('.acf-editor-wrap.delay textarea').css('height', '100px');
      // (filter called before the tinyMCE instance is created)
      acf.add_filter('wysiwyg_tinymce_settings', function(mceInit, id, $field) {
        // enable autoresizing of the WYSIWYG editor
        mceInit.wp_autoresize_on = true;
        return mceInit;
      });
      // (action called when a WYSIWYG tinymce element has been initialized)
      acf.add_action('wysiwyg_tinymce_init', function(ed, id, mceInit, $field) {
        // reduce tinymce's min-height settings
        ed.settings.autoresize_min_height = 100;
        // reduce iframe's 'height' style to match tinymce settings
        $('.acf-editor-wrap iframe').css('height', '100px');
      });
    })(jQuery)
  </script>
<?php
}

/*
 * -----------------------------------------------------------------------------
 * WordPress hooks
 * -----------------------------------------------------------------------------
*/
add_action('acf/input/admin_footer', 'PREFIX_apply_acf_modifications');

/ custom tinymce
add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );
function my_toolbars( $toolbars ){

// Array ( [Full] => Array ( [1] => Array ( [0] => formatselect [1] => bold [2] => italic [3] => bullist [4] => numlist [5] => blockquote [6] => alignleft [7] => aligncenter [8] => alignright [9] => link [10] => wp_more [11] => spellchecker [12] => fullscreen [13] => wp_adv ) [2] => Array ( [0] => strikethrough [1] => hr [2] => forecolor [4] => removeformat [5] => charmap [6] => outdent [7] => indent [8] => undo [9] => redo [10] => wp_help ) [3] => Array ( ) [4] => Array ( ) ) [Basic] => Array ( [1] => Array ( [0] => bold [1] => italic [2] => underline [3] => blockquote [4] => strikethrough [5] => bullist [6] => numlist [7] => alignleft [8] => aligncenter [9] => alignright [10] => undo [11] => redo [12] => link [13] => fullscreen ) ) )

  // Add a new toolbar called "Very Simple"
  // - this toolbar has only 1 row of buttons
  $toolbars['Very Simple' ] = array();
  $toolbars['Very Simple' ][1] = array('link', 'bold' , 'italic' , 'bullist', 'numlist', 'blockquote', 'alignleft', 'aligncenter', 'alignright', 'superscript', 'redo', 'undo'  );

  // // Edit the "Full" toolbar and remove 'code'
  // // - delet from array code from http://stackoverflow.com/questions/7225070/php-array-delete-by-value-not-key
  // if( ($key = array_search('code' , $toolbars['Full' ][2])) !== false )
  // {
  //     unset( $toolbars['Full' ][2][$key] );
  // }

  // // remove the 'Basic' toolbar completely
  // unset( $toolbars['Basic' ] );

  // return $toolbars - IMPORTANT!
  return $toolbars;

