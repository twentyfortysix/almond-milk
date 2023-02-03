<p align="center"><img src="almond-milk.png" /></p>

## What you got is:

Wordpress Twig based template<br>
/includes/ little bit of sweet Almond fat<br>
<a href="https://timber.github.io/docs/v2/" target="_blank">Timber (2.0.0-alpha.4)</a><br>
<a href="https://roots.io/bedrock/" targt="_blank">Bedrock</a><br>

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
- Do use Bedrock (https://roots.io/bedrock/) and this composer.json https://gist.github.com/twentyfortysix/5b88880c4e8e65ac7d012ff45a2b8294

In case of wp-init.sh run within the theme directory:
- composer require twbs/bootstrap:5.0.0
- composer require timber/timber

What I use over and over again, is:
- Register custom post types /includes/register-custom-post-types.php
- setup menu ("top_menu" see index.php)
- add custom fields with ACF (https://www.advancedcustomfields.com/)
- build up the template
