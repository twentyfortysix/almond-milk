## What you got is:


- style.css done in style.less
- index.php as router
- functions.php Timber init, script & styles init, plus ready to use includes as follows
- /css/ Bootstrap 4
- /js/ Bootstrap 4
- /includes/
  - create-taxonomies.php
  - customize-menu-order.php
  - p2p-registers.php
  - page-step-navigation.php
  - register-custom-post-types.php
  - remove-page-wyswig.php
  - remove-taxonomies.php
  - rename-pages.php
  - rename-posts.php
  - theme-support.php
- /twig/
- - - *

installation:
- either as *.zip
- use shell script https://github.com/twentyfortysix/wp_init to install and set up the WP for ya, with this theme in it
- or use Bedrock (https://roots.io/bedrock/) and this composer.json https://gist.github.com/twentyfortysix/5b88880c4e8e65ac7d012ff45a2b8294

run within the theme directory:
- composer require twbs/bootstrap:5.0.0
- composer require timber/timber

What I use over and over again, is:
- Register custom post types /includes/register-custom-post-types.php
- setup menu ("top_menu" see index.php)
- add custom fields with ACF (https://www.advancedcustomfields.com/)
- build up the template
