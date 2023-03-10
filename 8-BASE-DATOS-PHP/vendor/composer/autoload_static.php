<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb69f86ca15f2871c5b376d9600cfcf10
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PDO\\' => 4,
        ),
        'M' => 
        array (
            'MySQLi\\' => 7,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PDO\\' => 
        array (
            0 => __DIR__ . '/../..' . '/PDO',
        ),
        'MySQLi\\' => 
        array (
            0 => __DIR__ . '/../..' . '/MySQLi',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb69f86ca15f2871c5b376d9600cfcf10::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb69f86ca15f2871c5b376d9600cfcf10::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb69f86ca15f2871c5b376d9600cfcf10::$classMap;

        }, null, ClassLoader::class);
    }
}
