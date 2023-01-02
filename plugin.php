<?php
/**
 * Plugin Name: Browsersync Integration for WordPress
 * Plugin URI: https://github.com/lkraav/browser-sync-integration
 * Description: Loads browser-sync JS snippet.
 * Author: Leho Kraav
 * Requires PHP: 7.4
 * Version: 2022.12.16
 */

namespace BrowsersyncIntegration;

add_action( 'wp_footer', static function(): void {

    if ( 'production' !== wp_get_environment_type() ) {
        printf( <<<HTML
            <script id="__bs_script__">//<![CDATA[
                document.write("<script async src='http://HOST:%d/browser-sync/browser-sync-client.js'><\/script>".replace("HOST", location.hostname));
            //]]></script>
        HTML, defined( 'BROWSERSYNC_PORT' ) ? BROWSERSYNC_PORT : 3000 );
    }

} );
