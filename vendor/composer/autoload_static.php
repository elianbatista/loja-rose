<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita4bd0b1d29eb021d8b271c00f8de6093
{
    public static $prefixesPsr0 = array (
        'U' => 
        array (
            'URLify' => 
            array (
                0 => __DIR__ . '/..' . '/jbroadway/urlify',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInita4bd0b1d29eb021d8b271c00f8de6093::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}