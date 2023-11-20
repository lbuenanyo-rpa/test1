<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7669c4b42749e678d0806f97cecc9f9c
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'C4WP\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'C4WP\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
            1 => __DIR__ . '/../..' . '/admin',
        ),
    );

    public static $classMap = array (
        'C4WP\\C4WP_Captcha_Class' => __DIR__ . '/../..' . '/includes/class-c4wp-captcha-class.php',
        'C4WP\\C4WP_Functions' => __DIR__ . '/../..' . '/includes/class-c4wp-functions.php',
        'C4WP\\Methods\\C4WP_Method_Loader' => __DIR__ . '/../..' . '/includes/methods/class-c4wp-method-loader.php',
        'C4WP\\Methods\\Captcha' => __DIR__ . '/../..' . '/includes/methods/class-captcha.php',
        'C4WP\\Methods\\Cloudflare' => __DIR__ . '/../..' . '/includes/methods/class-cloudflare.php',
        'C4WP\\Methods\\HCaptcha' => __DIR__ . '/../..' . '/includes/methods/class-hcaptcha.php',
        'C4WP_Settings' => __DIR__ . '/../..' . '/admin/class-c4wp-settings.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7669c4b42749e678d0806f97cecc9f9c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7669c4b42749e678d0806f97cecc9f9c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7669c4b42749e678d0806f97cecc9f9c::$classMap;

        }, null, ClassLoader::class);
    }
}
