﻿<?php

use Silex\Provider\SessionServiceProvider;
use Silex\Provider\SecurityServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\RememberMeServiceProvider;
use SimpleUser\UserServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider;

$loader = require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

/**
 * A décommenter pour passer en mode debug 
 */

$app['debug'] = true;

/**
 * Enregistrer les libs dans l'application 
 */

// Twig
$app->register(new TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../src/LarpManager/Views'
));

// Doctrine DBAL
$app->register(new DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
		'host'   => '127.0.0.1',
		'dbname'   => 'larpmanager',	// update with your own database name
		'user'   => 'root',				// update with yout own database user
		'password'   => ''				// update with yout own database password
    ),
));

// Doctrine ORM
$app->register(new DoctrineOrmServiceProvider(), array(
    "orm.proxies_dir" => __DIR__."/../cache/proxies",
    "orm.em.options" => array(
        "mappings" => array(
            array(
                "type" => "annotation",
                "namespace" => "LarpManager\Entities",
                "path" => __DIR__."/../src/LarpManager/Entities",
            ),
        ),
    ),
));

// Sessions
$app->register(new SessionServiceProvider());

// Security
$app->register(new SecurityServiceProvider());

// User management
$app->register(new ServiceControllerServiceProvider());
$app->register(new RememberMeServiceProvider());
$userServiceProvider = new UserServiceProvider();
$app->register($userServiceProvider);

$app['user.options'] = array(
      'templates' => array(
        'layout' => 'user/layout.twig',
        'register' => 'user/register.twig',
        'register-confirmation-sent' => 'user/register-confirmation-sent.twig',
        'login' => 'user/login.twig',
        'login-confirmation-needed' => 'user/login-confirmation-needed.twig',
        'forgot-password' => 'user/forgot-password.twig',
        'reset-password' => 'user/reset-password.twig',
        'view' => 'user/view.twig',
        'edit' => 'user/edit.twig',
        'list' => 'user/list.twig',
    ),
);

// Define firewall
$app['security.firewalls'] = array(
	'install' => array(	// temporaire : install doit être accessible à tous
		'pattern' => '^/install$',
	),
    'login' => array(	// login doit être accessible à tous
        'pattern' => '^/user/login$',
    ),
	'register' => array( // register doit être accessible à tous
        'pattern' => '^/user/register$',
    ),
    'secured_area' => array(	// le reste necessite d'être connecté
		'pattern' => '^/.*$',
        'anonymous' => true,
		'remember_me' => array(),
        'form' => array(
            'login_path' => '/user/login',
            'check_path' => '/user/login_check',
        ),
        'logout' => array(
            'logout_path' => '/user/logout',
        ),
        'users' => $app->share(function($app) { return $app['user.manager']; }),
    ),
);

// Gestion des urls
$app->register(new UrlGeneratorServiceProvider());


/**
 * Définition des routes
 */

$app->mount('/', new LarpManager\HomepageControllerProvider());
$app->mount('/user', $userServiceProvider);
$app->mount('/install', new LarpManager\InstallControllerProvider());
$app->mount('/gn', new LarpManager\GnControllerProvider());

return $app;