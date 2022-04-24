<?php
if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page(
    [
      'page_title'  => 'Frontend',
      'menu_title'  => 'Frontend',
      'menu_slug'   => 'frontend-settings',
      'capability'  => 'edit_posts',
      'redirect'    => false
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
