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

return new \Phalcon\Config(array(

    'site' => array(
        'name'      => 'Phalcon Tips (Ja)',
        'url'       => $_SERVER['SITE_URL'],
        'project'   => 'Phalcon',
        'software'  => 'Phosphorum',
        'repo'      => 'https://github.com/phalcon/cphalcon/issues',
        'docs'      => 'https://github.com/phalcon/docs',
    ),

    'database'    => array(
        'adapter'  => 'Mysql',
        'host'     => 'localhost',
        'username' => $_SERVER['DB_USERNAME'],
        'password' => $_SERVER['DB_PASSWORD'],
        'dbname'   => 'phalcon_tips',
        'charset'  => 'utf8'
    ),

    'application' => array(
        'controllersDir' => APP_PATH . '/app/controllers/',
        'modelsDir'      => APP_PATH . '/app/models/',
        'viewsDir'       => APP_PATH . '/app/views/',
        'pluginsDir'     => APP_PATH . '/app/plugins/',
        'libraryDir'     => APP_PATH . '/app/library/',
        'development'    => array(
            'staticBaseUri' => '/',
            'baseUri'       => '/'
        ),
        'production'     => array(
            'staticBaseUri' => 'http://static.phosphorum.com/',
            'baseUri'       => '/'
        ),
        'debug'          => (bool) $_SERVER['APP_DEBUG'],
    ),

    'mandrillapp' => array(
        'secret' => ''
    ),

    'github'      => array(
        'clientId'     => $_SERVER['GITHUB_CLIENT_ID'],
        'clientSecret' => $_SERVER['GITHUB_CLIENT_SECRET'],
        'redirectUri'  => $_SERVER['GITHUB_REDIRECT_URI'],
    ),

    'amazonSns'   => array(
        'secret' => ''
    ),

    'smtp'        => array(
        'host'     => "localhost",
        'port'     => 25,
        'security' => "",
        'username' => "",
        'password' => ""
    ),

    'beanstalk'   => array(
        'disabled' => false,
        'host'     => '127.0.0.1'
    ),

    'elasticsearch' => array(
        'index'    => 'phosphorum'
    ),

    'mail'     => array(
        'fromName'     => $_SERVER['MAIL_FROM_NAME'],
        'fromEmail'    => $_SERVER['MAIL_FROM_EMAIL'],
    )
));
