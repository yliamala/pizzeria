<?php

spl_autoload_register(function ($class) {
    $parts = str_replace(['\\'], ['/'], $class);
    require_once (__DIR__ . '/' . strtolower($parts) . '.php');
});