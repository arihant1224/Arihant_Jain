<?php
/**
 *
 * @package   GS_Projects
 * @author    GS Plugins <samdani1997@gmail.com>
 * @license   GPL-2.0+
 * @link      https://www.gsplugins.com
 * @copyright 2016 GS Plugins
 *
 * @wordpress-plugin
 * Plugin Name:         GS Projects Lite
 * Plugin URI:          https://www.gsplugins.com/wordpress-plugins
 * Description:         Best Responsive Projects plugin for Wordpress to showcase Projects with Title, Desc, Category, Skills, Project URL, Client review & ratings, Project Image / Gallery, Youtube / Vimeo video. Display anywhere at your site using shortcode like [gs_projects theme="gs_project_theme1"] & widgets. Check more shortcode examples and documentation at <a href="http://projects.gsplugins.com">GS Projects PRO Demos & Docs</a>
 * Version:             1.0.6
 * Author:              GS Plugins
 * Author URI:          https://www.gsplugins.com
 * Text Domain:         gsprojects
 * License:             GPL-2.0+
 * License URI:         http://www.gnu.org/licenses/gpl-2.0.txt
 */

if( ! defined( 'GSPROJECTS_HACK_MSG' ) ) define( 'GSPROJECTS_HACK_MSG', __( 'Sorry cowboy! This is not your place', 'gsprojects' ) );

/**
 * Protect direct access
 */
if ( ! defined( 'ABSPATH' ) ) die( GSPROJECTS_HACK_MSG );

/**
 * Defining constants
 */
if( ! defined( 'GSPROJECTS_VERSION' ) ) define( 'GSPROJECTS_VERSION', '1.0.6' );
if( ! defined( 'GSPROJECTS_MENU_POSITION' ) ) define( 'GSPROJECTS_MENU_POSITION', 40 );
if( ! defined( 'GSPROJECTS_PLUGIN_DIR' ) ) define( 'GSPROJECTS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
if( ! defined( 'GSPROJECTS_PLUGIN_URI' ) ) define( 'GSPROJECTS_PLUGIN_URI', plugins_url( '', __FILE__ ) );
if( ! defined( 'GSPROJECTS_FILES_DIR' ) ) define( 'GSPROJECTS_FILES_DIR', GSPROJECTS_PLUGIN_DIR . 'gsprojects-files' );
if( ! defined( 'GSPROJECTS_FILES_URI' ) ) define( 'GSPROJECTS_FILES_URI', GSPROJECTS_PLUGIN_URI . '/gsprojects-files' );

require_once GSPROJECTS_FILES_DIR . '/includes/gs-projects-cpt.php';
require_once GSPROJECTS_FILES_DIR . '/includes/gs-projects-meta-fields.php';
require_once GSPROJECTS_FILES_DIR . '/includes/gs-projects-column.php';
require_once GSPROJECTS_FILES_DIR . '/includes/gs-projects-shortcode.php';
require_once GSPROJECTS_FILES_DIR . '/gs-projects-scripts.php';
require_once GSPROJECTS_FILES_DIR . '/admin/class.settings-api.php';
require_once GSPROJECTS_FILES_DIR . '/admin/gs_projects_options_config.php';
require_once GSPROJECTS_FILES_DIR . '/gs-plugins/gs-plugins.php';
require_once GSPROJECTS_FILES_DIR . '/gs-plugins/gs-plugins-free.php';

if ( ! function_exists('gs_projects_pro_link') ) {
    function gs_projects_pro_link( $gsProject_links ) {
        $gsProject_links[] = '<a class="gs-project-pro-link" href="https://www.gsplugins.com/product/wordpress-projects-showcase-plugin" target="_blank">Go Pro!</a>';
        $gsProject_links[] = '<a href="https://www.gsplugins.com/wordpress-plugins" target="_blank">GS Plugins</a>';
        return $gsProject_links;
    }
    add_filter( 'plugin_action_links_' .plugin_basename(__FILE__), 'gs_projects_pro_link' );
}

/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function appsero_init_tracker_gs_projects() {

    if ( ! class_exists( 'Appsero\Client' ) ) {
      require_once GSPROJECTS_FILES_DIR . '/appsero/src/Client.php';
    }

    $client = new Appsero\Client( '782c9661-ef27-45dd-a28f-d1925c253fdf', 'GS Projects Lite', __FILE__ );

    // Active insights
    $client->insights()->init();

}

appsero_init_tracker_gs_projects();