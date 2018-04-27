<?php
/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
 
 use Phalcon\Db\Adapter\Pdo\Postgresql;
 
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

return new \Phalcon\Config([
    'database' => [
//        'adapter'     => 'Mysql',
				'adapter'     => 'Postgresql',
		        'host'        => 'ec2-54-243-210-70.compute-1.amazonaws.com',
				'username'    => 'pfccnclzowrzyb',
				'password'    => 'f08d84a2e8a83636a9ab9bcfe80ae7447696fe6903e90792231d7112606b7fd9',
				'dbname'      => 'd8skbinfa43v3m',
				'port'        => '5432',
                'schema'      => 'public'   
    ],
    'application' => [
        'appDir'         => APP_PATH . '/',
        'controllersDir' => APP_PATH . '/controllers/',
        'modelsDir'      => APP_PATH . '/models/',
        'migrationsDir'  => APP_PATH . '/migrations/',
        'viewsDir'       => APP_PATH . '/views/',
        'pluginsDir'     => APP_PATH . '/plugins/',
        'libraryDir'     => APP_PATH . '/library/',
        'cacheDir'       => BASE_PATH . '/cache/',

        // This allows the baseUri to be understand project paths that are not in the root directory
        // of the webpspace.  This will break if the public/index.php entry point is moved or
        // possibly if the web server rewrite rules are changed. This can also be set to a static path.
        //'baseUri'        => preg_replace('/public([\/\\\\])index.php$/', '', $_SERVER["PHP_SELF"]),
		'baseUri'        => '/pruebaRest/',
		'staticUri'       => '/pruebaRest/',
    ]
]);
