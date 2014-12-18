<?php
/**
 * config for heroku
 */

$db = parse_url($_SERVER['CLEARDB_DATABASE_URL']);
$db['dbname'] = ltrim($db['path'], '/');

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
        'host'     => $db['host'],
        'username' => $db['user'],
        'password' => $db['pass'],
        'dbname'   => $db['dbname'],
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
        'debug'          => false
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
        'disabled' => true,
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
