<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit829dffbefc2c309db5b8de3839e3d63e
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit829dffbefc2c309db5b8de3839e3d63e::$classMap;

        }, null, ClassLoader::class);
    }
}
