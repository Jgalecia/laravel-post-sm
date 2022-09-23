<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0d44c95cf79b040c8059156dc8acc1e8
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Composer\\CaBundle\\' => 18,
        ),
        'A' => 
        array (
            'Abraham\\TwitterOAuth\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Composer\\CaBundle\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/ca-bundle/src',
        ),
        'Abraham\\TwitterOAuth\\' => 
        array (
            0 => __DIR__ . '/..' . '/abraham/twitteroauth/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0d44c95cf79b040c8059156dc8acc1e8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0d44c95cf79b040c8059156dc8acc1e8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0d44c95cf79b040c8059156dc8acc1e8::$classMap;

        }, null, ClassLoader::class);
    }
}