<?php

namespace App;

class MenuCtrl {

  public function __construct()
  {
      add_action('admin_menu',[$this,'register_menu']);
  }

  public function register_menu(){
    add_menu_page(
      'Wp React',
      'Wp React',
      'manage_options',
      'wp-react-rest',
      [$this,'wp_react_rest_page'],
      'dashicons-tagcloud'
    );
    add_submenu_page( 'wp-react-rest', 
      'Dashboard', 
      'Dashboard', 
      'manage_options', 
      'wp-react-rest#/', 
      [$this,'wp_react_rest_page'],
    );
    
    foreach ($this->submenu() as $submenu){
      add_submenu_page( 'wp-react-rest', 
      $submenu['label'], 
      $submenu['label'], 
      $submenu['permission'], 
      'wp-react-rest#/'.$submenu['id'], 
      [$this,'wp_react_rest_page'],
    );
    }
    remove_submenu_page("wp-react-rest", "wp-react-rest");
  }

  public function submenu() : array {
    return [
      [
        'id' => 'posts',
        'label' => 'Posts',
        'permission' => 'manage_options'
      ],
      [
        'id' => 'pages',
        'label' => 'Pages',
        'permission' => 'manage_options'
      ]
    ];
  }

  public function wp_react_rest_page() {
    echo '<div id="wp-react-rest-root"></div>';
  }
}