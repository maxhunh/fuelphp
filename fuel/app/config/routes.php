<?php
return array(
	'_root_'  => 'tweet/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
    '_product_' => 'product/index',

	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);
