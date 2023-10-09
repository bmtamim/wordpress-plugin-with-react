<?php

namespace App\Api;
use WP_REST_Controller;
use WP_REST_Server;

class PostApi extends WP_REST_Controller{
  public function __construct()
  {
     $this->namespace = 'wrapi/v1';
     $this->route = '/posts';
     add_action('rest_api_init',[$this,'register_routes']);
  }

  public function register_routes() {
    register_rest_route( $this->namespace, $this->route,[
        'method' => WP_REST_Server::READABLE,
        'callback' => [$this,'callback'],
        'permission_callback' => [$this,'permission_callback'],
    ]);
  }

  public function callback() {
      $data = [
        'name' => 'Tamim'
      ];

      wp_send_json_success($data);
  }
  
  public function permission_callback() {
    return true;
  }
}