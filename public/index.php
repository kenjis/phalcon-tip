<?php

/*
 +------------------------------------------------------------------------+
 | Phosphorum                                                             |
 +------------------------------------------------------------------------+
 | Copyright (c) 2013-2014 Phalcon Team and contributors                  |
 +------------------------------------------------------------------------+
 | This source file is subject to the New BSD License that is bundled     |
 | with this package in the file docs/LICENSE.txt.                        |
 |                                                                        |
 | If you did not receive a copy of the license and are unable to         |
 | obtain it through the world-wide-web, please send an email             |
 | to license@phalconphp.com so we can send you a copy immediately.       |
 +------------------------------------------------------------------------+
*/

use Phalcon\Http\Response;
use Phalcon\Mvc\Application;
use Phalcon\DI\FactoryDefault;
use Phalcon\Logger\Adapter\File as Logger;

error_reporting(E_ALL);

if (!isset($_GET['_url'])) {
    $_GET['_url'] = '/';
}

define('APP_PATH', realpath('..'));

require __DIR__ . '/../vendor/vlucas/phpdotenv/src/Dotenv.php';
Dotenv::load(__DIR__ . '/../');

/**
 * Read the configuration
 */
switch ($_SERVER['APP_ENV']) {
    case 'heroku':
        $config = include APP_PATH . "/app/config/config_heroku.php";
        unset($db);
        break;
    default:
        $config = include APP_PATH . "/app/config/config.php";
        break;
}

/**
 * Include the loader
 */
require APP_PATH . "/app/config/loader.php";

/**
 * Include composer autoloader
 */
require APP_PATH . "/vendor/autoload.php";

try {

    /**
     * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
     */
    $di = new FactoryDefault();

    /**
     * Include the application services
     */
    switch ($_SERVER['APP_ENV']) {
        case 'heroku':
            require APP_PATH . "/app/config/services_heroku.php";
            break;
        default:
            require APP_PATH . "/app/config/services.php";
            break;
    }

    /**
     * Handle the request
     */
    $application = new Application($di);

    echo $application->handle()->getContent();

} catch (Exception $e) {

    /**
     * Log the exception
     */
    $logger = new Logger(APP_PATH . '/app/logs/error.log');
    $logger->error($e->getMessage());
    $logger->error($e->getTraceAsString());

    echo $e->getMessage(), '<br>';
    echo nl2br(htmlentities($e->getTraceAsString()));

}
