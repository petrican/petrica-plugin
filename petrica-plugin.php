<?php
/*
Plugin Name: My Server Info
Description: ServerBuddy Clone
Version: 1.0.1
Author: Petrica Nanca
*/

// If we haven't loaded this plugin from Composer we need to add our own autoloader
if (!class_exists('Petrica\PETRICAPlugin')) {
    // Get a reference to our PSR-4 Autoloader function that we can use to add our
    // Petrica namespace
    $autoloader = require_once('autoload.php');

    // Use the autoload function to setup our class mapping
    $autoloader('Petrica\\', __DIR__ . '/src/Petrica/');

}

// We are now able to autoload classes under the Petrica namespace so we
// can implement what ever functionality this plugin is supposed to have
\Petrica\PETRICAPlugin::init();
