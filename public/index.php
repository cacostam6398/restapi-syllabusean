<?php

use Phalcon\Loader;
use Phalcon\Mvc\Micro;
use Phalcon\Di\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql as PdoMysql;
use Phalcon\Db\Adapter\Pdo\Postgresql;
use Phalcon\Http\Response;


error_reporting(E_ALL);
/**
define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');
 */
 
try {

    /**
     * The FactoryDefault Dependency Injector automatically registers
     * the services that provide a full stack framework.
     */
	 // Use Loader() to autoload our model
	$loader = new Loader();
	
	$loader->registerNamespaces(
		[
			'machine\robot' => __DIR__ . '/models/',
		]
	);
	
	
	$loader->register();
	 
    $di = new FactoryDefault();
	
	// Set up the database service
$di->set(
    'db',
    function () {
 //       return new PdoMysql(
		  return new Postgresql(
            [ 
 //               'host'     => 'localhost',
 //               'username' => 'root',
 //               'password' => '',
 //               'dbname'   => 'test',
				'adapter'     => 'Postgresql',
		        'host'        => 'ec2-54-243-210-70.compute-1.amazonaws.com',
				'username'    => 'pfccnclzowrzyb',
				'password'    => 'f08d84a2e8a83636a9ab9bcfe80ae7447696fe6903e90792231d7112606b7fd9',
				'dbname'      => 'd8skbinfa43v3m',
				'port'        => '5432',
				'schema'      => 'public'
            ]
        );
    }
);
	
	
	
	$app = new Micro($di);

    /**
     * Handle routes
     
    include APP_PATH . '/config/router.php';
	*/
    /**
     * Read services
     
    include APP_PATH . '/config/services.php';
	*/
    /**
     * Get config service for use in inline setup below
     
    $config = $di->getConfig();
*/
    /**
     * Include Autoloader
     
    include APP_PATH . '/config/loader.php';
	*/
    /**
     * Handle the request
     */
    //$application = new \Phalcon\Mvc\Application($di);

    //echo str_replace(["\n","\r","\t"], '', $application->handle()->getContent());
	
	// Retrieves all robots
$app->get(
    '/api/robots',
    function () use ($app) {
        $phql = 'SELECT * FROM machine\robot\Robots ORDER BY name';

        $robots = $app->modelsManager->executeQuery($phql);

        $data = [];

        foreach ($robots as $robot) {
            $data[] = [
                'id_robot'   => $robot->id_robot,
                'name' => $robot->name,
            ];
        }

        echo json_encode($data);
    }
);

// Searches for robots with $name in their name
$app->get(
    '/api/robots/search/{name}',
    function ($name) use ($app) {
        $phql = 'SELECT * FROM machine\robot\Robots WHERE name LIKE :name: ORDER BY name';

        $robots = $app->modelsManager->executeQuery(
            $phql,
            [
                'name' => '%' . $name . '%'
            ]
        );

        $data = [];

        foreach ($robots as $robot) {
            $data[] = [
                'id_robot'   => $robot->id_robot,
                'name' => $robot->name,
            ];
        }

        echo json_encode($data);
    }
);

// Retrieves robots based on primary key
$app->get(
     '/api/robots/{id:[0-9]+}',
    function ($id) use ($app) {
        $phql = 'SELECT * FROM machine\robot\Robots WHERE id_robot = :id_robot:';

        $robot = $app->modelsManager->executeQuery(
            $phql,
            [
                'id_robot' => $id,
            ]
        )->getFirst();

        // Create a response
        $response = new Response();

        if ($robot === false) {
            $response->setJsonContent(
                [
                    'status' => 'NOT-FOUND'
                ]
            );
        } else {
            $response->setJsonContent(
                [
                    'status' => 'FOUND',
                    'data'   => [
                        'id_robot'   => $robot->id_robot,
                        'name' => $robot->name
                    ]
                ]
            );
        }

        return $response;
    }
);

// Adds a new robot
$app->post(
   '/api/robots',
    function () use ($app) {
        $robot = $app->request->getJsonRawBody();

        $phql = 'INSERT INTO machine\robot\Robots (name, type, year) VALUES (:name:, :type:, :year:)';

        $status = $app->modelsManager->executeQuery(
            $phql,
            [
                'name' => $robot->name,
                'type' => $robot->type,
                'year' => $robot->year,
            ]
        );

        // Create a response
        $response = new Response();

        // Check if the insertion was successful
        if ($status->success() === true) {
            // Change the HTTP status
            $response->setStatusCode(201, 'Created');

            $robot->id = $status->getModel()->id;

            $response->setJsonContent(
                [
                    'status' => 'OK',
                    'data'   => $robot,
                ]
            );
        } else {
            // Change the HTTP status
            $response->setStatusCode(409, 'Conflict');

            // Send errors to the client
            $errors = [];

            foreach ($status->getMessages() as $message) {
                $errors[] = $message->getMessage();
            }

            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => $errors,
                ]
            );
        }

        return $response;
    }
);

// Updates robots based on primary key
$app->put(
   '/api/robots/{id:[0-9]+}',
    function ($id) use ($app) {
        $robot = $app->request->getJsonRawBody();

        $phql = 'UPDATE machine\robot\Robots SET name = :name:, type = :type:, year = :year: WHERE id = :id:';

        $status = $app->modelsManager->executeQuery(
            $phql,
            [
                'id'   => $id,
                'name' => $robot->name,
                'type' => $robot->type,
                'year' => $robot->year,
            ]
        );

        // Create a response
        $response = new Response();

        // Check if the insertion was successful
        if ($status->success() === true) {
            $response->setJsonContent(
                [
                    'status' => 'OK'
                ]
            );
        } else {
            // Change the HTTP status
            $response->setStatusCode(409, 'Conflict');

            $errors = [];

            foreach ($status->getMessages() as $message) {
                $errors[] = $message->getMessage();
            }

            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => $errors,
                ]
            );
        }

        return $response;
    }
);

// Deletes robots based on primary key
$app->delete(
    '/api/robots/{id:[0-9]+}',
    function ($id) use ($app) {
        $phql = 'DELETE FROM machine\robot\Robots WHERE id = :id:';

        $status = $app->modelsManager->executeQuery(
            $phql,
            [
                'id' => $id,
            ]
        );

        // Create a response
        $response = new Response();

        if ($status->success() === true) {
            $response->setJsonContent(
                [
                    'status' => 'OK'
                ]
            );
        } else {
            // Change the HTTP status
            $response->setStatusCode(409, 'Conflict');

            $errors = [];

            foreach ($status->getMessages() as $message) {
                $errors[] = $message->getMessage();
            }

            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => $errors,
                ]
            );
        }

        return $response;
    }
);

$app->handle();
	
	

} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
