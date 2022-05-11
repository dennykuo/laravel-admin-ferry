<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7367a98e9b07483771adca2fe46fb074
{
    public static $files = array (
        'd4c4302196ab0352b97d0ba59c93dee3' => __DIR__ . '/../..' . '/src/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Dennykuo\\AdminFerry\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Dennykuo\\AdminFerry\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7367a98e9b07483771adca2fe46fb074::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7367a98e9b07483771adca2fe46fb074::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7367a98e9b07483771adca2fe46fb074::$classMap;

        }, null, ClassLoader::class);
    }
}