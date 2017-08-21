<?php

require __DIR__ . '/vendor/autoload.php';

spl_autoload_register(
    function ($class){
        if (0 === strpos($class, 'App')){
            require __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
        }
    }
);