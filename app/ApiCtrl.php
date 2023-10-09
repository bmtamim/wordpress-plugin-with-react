<?php 
namespace App;

use App\Api\PostApi;

class ApiCtrl{
  public function __construct()
  {
    new PostApi();
    add_filter('rest_request_before_callbacks', [$this, 'rest_request_filter'], 10, 3);
  }

  public function rest_request_filter($response, $handler, $request) {
		$permalink_structure = get_option('permalink_structure');
        if ( $permalink_structure === '' ) {
			$params = $request->get_params();
			if ( isset($params['rest_route']) ) {
				$query_string = parse_url($params['rest_route'], PHP_URL_QUERY);
				// Parse the query string into an array of parameters
				parse_str($query_string, $param_form_args);
				foreach( $param_form_args as $key => $val) {
					$request->set_param( $key, $val);
				}
			}
		}
		return $request;
	}
}