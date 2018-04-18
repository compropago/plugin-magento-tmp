<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit121669dca73ef4c5d41f9c1c870bf0f6
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'CompropagoSdk\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'CompropagoSdk\\' => 
        array (
            0 => __DIR__ . '/..' . '/compropago/php-sdk/CompropagoSdk',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit121669dca73ef4c5d41f9c1c870bf0f6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit121669dca73ef4c5d41f9c1c870bf0f6::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
