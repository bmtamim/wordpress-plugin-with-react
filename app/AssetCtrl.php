<?php 

namespace App;

class AssetCtrl{

  public function __construct()
  {
      add_action('admin_enqueue_scripts',[$this,'admin_enqueue']);
  }

  public function admin_enqueue()  {
    wp_enqueue_script('wrapi-dashboard-js',PLUGIN_URL.'assets/js/dashboard.js',[],time(),true);
  }
}