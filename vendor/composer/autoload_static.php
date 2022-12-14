<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit63f4391fe672732b1fe98bbaa4c10e9f
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit63f4391fe672732b1fe98bbaa4c10e9f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit63f4391fe672732b1fe98bbaa4c10e9f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit63f4391fe672732b1fe98bbaa4c10e9f::$classMap;

        }, null, ClassLoader::class);
    }
}