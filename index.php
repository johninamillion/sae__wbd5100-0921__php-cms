<?php

namespace Application;

// Error Reporting anschalten
error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

// Autoloader einbinden
/** @var string $autoload_file */
$autoload_file = __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

// Überprüfen ob eine autoload.php über Composer erstellt wurde
if ( file_exists( $autoload_file ) === FALSE ) {
    trigger_error(
        'vendor/autoload.php file doesn\'t exist. Please run \'composer update\'.',
        E_ERROR
    );
}

include_once $autoload_file;

// Konfiguration einbinden
$config_file = __DIR__ . DIRECTORY_SEPARATOR . 'config.php';

// Überprüfen ob die config-example.php in config.php umbenannt wurde und eine Konfiguration vorliegt
if ( file_exists( $config_file ) === FALSE ) {
    trigger_error(
        'config.php file doesn\'t exist. Please rename config-example.php and fill in your credentials.',
        E_ERROR
    );
}

include_once $config_file;

// Session starten
Session::start();

// Anwendungsablauf starten
( new Bootstrap() )->run();
