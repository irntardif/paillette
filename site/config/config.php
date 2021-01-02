<?php

/**
 * The config file is optional. It accepts a return array with config options
 * Note: Never include more than one return statement, all options go within this single return array
 * In this example, we set debugging to true, so that errors are displayed onscreen. 
 * This setting must be set to false in production.
 * All config options: https://getkirby.com/docs/reference/system/options
 */
return [
    'debug' => true,
    'thumbs' => [
		'presets' => [
	    	'default' => ['width' => 400, 'quality' => 80, 'blur' => true],
	   	],
	   	'srcsets' => [
		  'default' => [
		    '800w' => ['width' => 1600, 'quality' => 90],
		    '1024w' => ['width' => 2048, 'quality' => 90],
		    '1280w' => ['width' => 1560, 'quality' => 90],
		    '1440w' => ['width' => 2880, 'quality' => 90],
		    '1600w' => ['width' => 3200, 'quality' => 90],
		    '2048w' => ['width' => 4096, 'quality' => 90]
		  ]
		],
	],
    
];
