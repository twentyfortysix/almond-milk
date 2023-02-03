<p align="center"><img src="almond-milk.png" /></p>

## What you got is:

Wordpress Twig based template
/includes/ little bit of sweet Almond fat
Based on Timber 2.0.0-alpha.4

- style.css done in style.less
- index.php as router
- functions.php Timber init, script & styles init, plus ready to use includes as follows
- /css/ 
- /js/ 
- /includes/
- /include/timber.php
- /include/theme-support.php
- /include/remove_api.php
- /include/acf.php
- /include/remove-page-wyswig.php
- /include/customize-appereance-menus.php
- /include/register-custom-post-types.php
- /include/customize-admin-menu.php
- /include/rename-posts.php
- /include/rename-pages.php
- /include/p2p-registers.php
- /include/remove-taxonomies.php
- /include/page-step-navigation.php
- /include/register-taxonomies.php
- /include/googleAPI.php
- /include/GQL_ACF.php
- /twig/
- - - *

Installation:
- either as *.zip
- use shell script https://github.com/twentyfortysix/wp_init to install and set up the WP for ya, with this theme in it
- or use Bedrock (https://roots.io/bedrock/) and this composer.json https://gist.github.com/twentyfortysix/5b88880c4e8e65ac7d012ff45a2b8294

In case of wp-init.sh run within the theme directory:
- composer require twbs/bootstrap:5.0.0
- composer require timber/timber

What I use over and over again, is:
- Register custom post types /includes/register-custom-post-types.php
- setup menu ("top_menu" see index.php)
- add custom fields with ACF (https://www.advancedcustomfields.com/)
- build up the template
