<?php
/**
 * @package PodcastRSSPlugin
 */
/*
Plugin Name: Podcast RSS Plugin
Plugin URI: https://github.com/oriolr/PodcastRSSPlugin
Description: This plugin will import your podcast RSS feed and create a blog layout output
Version: 1.0.0
Author: Rosler Oriol
Author URI: http://rosleroriol.com
License: GPLv3
Text Domain: podcastrss-plugin
*/

/*
    Podcast RSS Plugin is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Podcast RSS Plugin is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Podcast RSS Plugin.  If not, see <https://www.gnu.org/licenses/>.
    
*/


defined ( 'ABSPATH' ) or die( 'Access denied' );

class PodcastRssPlugin 
{
    function __construct() {
        add_action( 'init', array( $this, 'custom_post_type' ) );
    }

    function activate() {
        //generated a CPT
        $this->custom_post_type();
        //flush rewrite rules
        flush_rewrite_rules();
    }

    function deactive() {
        //flush rewrite rules
        flush_rewrite_rules();
    }

    function uninstall(){

    }

    function custom_post_type() {
        register_post_type( 'podcastpost', ['public' => true, 'label' => 'Podcast'] );
    }
}

if ( class_exists( 'PodcastRssPlugin' ) ) {
    $podcastRssplugin = new PodcastRSSPlugin();
}

// activation 
register_activation_hook(__FILE__, array( $podcastRssplugin, 'activate') );

//deactivation
register_deactivation_hook(__FILE__, array( $podcastRssplugin, 'deactivate') );