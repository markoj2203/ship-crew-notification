<?php
// bootstrap.php
use DI\ContainerBuilder;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;

//$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/../src/Entity"), $isDevMode);
// or if you prefer yaml or XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

$paths = array(__DIR__."/../src/Entity");

//Connection for Doctrine
$conn = array(
    'dbname' => 'ship_notification',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
    'charset'  => 'utf8',
    'driverOptions' => array(
        1002 => 'SET NAMES utf8'
    )
);

$config = Setup::createConfiguration($isDevMode);
$driver = new AnnotationDriver(new AnnotationReader(), $paths);

// registering noop annotation autoloader - allow all annotations by default
AnnotationRegistry::registerLoader('class_exists');
$config->setMetadataDriverImpl($driver);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);

//$UserController = $container->get('app\controllers\UserController');

//$UserController->users($entityManager);