<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit633ddf67190d248856ca22f1f4a1f79c
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'StackOverFlow\\' => 14,
        ),
        'P' => 
        array (
            'ParkingLot\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'StackOverFlow\\' => 
        array (
            0 => __DIR__ . '/../..' . '/stack_overflow/src',
        ),
        'ParkingLot\\' => 
        array (
            0 => __DIR__ . '/../..' . '/designing_a_parking_lot_system/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit633ddf67190d248856ca22f1f4a1f79c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit633ddf67190d248856ca22f1f4a1f79c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit633ddf67190d248856ca22f1f4a1f79c::$classMap;

        }, null, ClassLoader::class);
    }
}
