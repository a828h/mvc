<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7c6b0f733372cdb39b45def988bf2309
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7c6b0f733372cdb39b45def988bf2309::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7c6b0f733372cdb39b45def988bf2309::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
