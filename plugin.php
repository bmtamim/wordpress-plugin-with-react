<?php

/**
 * WP Rest Api With React
 *
 * @package           WP_Rest_Api_With_React
 * @author            Tamim
 * @copyright         2023 Tamim
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       WP Rest Api With React
 * Description:       Description of the plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Tamim
 * Author URI:        https://example.com
 * Text Domain:       plugin-slug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://example.com/my-plugin/
 */

use App\ApiCtrl;
use App\AssetCtrl;
use App\MenuCtrl;

require_once __DIR__ . '/vendor/autoload.php';

define('PLUGIN_URL',trailingslashit(plugin_dir_url(__FILE__)));


final class WP_Rest_Api_With_React{

  public function __construct()
  {
    new ApiCtrl();
    new MenuCtrl();
    new AssetCtrl();
  }

  public static function init(){
    $instance = false;
    if(!$instance){
      $instance = new self();
    }
    return $instance;
  }
}

WP_Rest_Api_With_React::init();
