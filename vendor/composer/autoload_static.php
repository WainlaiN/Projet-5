<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc3d2e3cd07540fd6f08b0f95aa59c182
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc3d2e3cd07540fd6f08b0f95aa59c182::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc3d2e3cd07540fd6f08b0f95aa59c182::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
