<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite29d36cb62928a680742bd5ef827a6ed
{
    public static $files = array (
        '7e9bd612cc444b3eed788ebbe46263a0' => __DIR__ . '/..' . '/laminas/laminas-zendframework-bridge/src/autoload.php',
        '34122c0574b76bf21c9a8db62b5b9cf3' => __DIR__ . '/..' . '/cakephp/chronos/src/carbon_compat.php',
        '07d7f1a47144818725fd8d91a907ac57' => __DIR__ . '/..' . '/laminas/laminas-diactoros/src/functions/create_uploaded_file.php',
        'da94ac5d3ca7d2dbab84ce561ce72bfd' => __DIR__ . '/..' . '/laminas/laminas-diactoros/src/functions/marshal_headers_from_sapi.php',
        '3d97c8dcdfba8cb85d3b34f116bb248b' => __DIR__ . '/..' . '/laminas/laminas-diactoros/src/functions/marshal_method_from_sapi.php',
        'e6f3bc6883e449ab367280b34158c05b' => __DIR__ . '/..' . '/laminas/laminas-diactoros/src/functions/marshal_protocol_version_from_sapi.php',
        'd59fbae42019aedf227094ac49a46f50' => __DIR__ . '/..' . '/laminas/laminas-diactoros/src/functions/marshal_uri_from_sapi.php',
        'de95e0ac670b27c84ef8c5ac41fc1b34' => __DIR__ . '/..' . '/laminas/laminas-diactoros/src/functions/normalize_server.php',
        'b6c2870932b0250c10334a86dcb33c7f' => __DIR__ . '/..' . '/laminas/laminas-diactoros/src/functions/normalize_uploaded_files.php',
        'd02cf21124526632320d6f20b1bbf905' => __DIR__ . '/..' . '/laminas/laminas-diactoros/src/functions/parse_cookie_header.php',
        'd919fc9d5ad52cfb7f322f7fe36458ab' => __DIR__ . '/..' . '/laminas/laminas-diactoros/src/functions/create_uploaded_file.legacy.php',
        'e397f74f8af3b1e56166a6e99f216ee7' => __DIR__ . '/..' . '/laminas/laminas-diactoros/src/functions/marshal_headers_from_sapi.legacy.php',
        'd154b49fab8e4da34fb553a2d644918c' => __DIR__ . '/..' . '/laminas/laminas-diactoros/src/functions/marshal_method_from_sapi.legacy.php',
        '9d3db23ca418094bcf0b641a0c9559ed' => __DIR__ . '/..' . '/laminas/laminas-diactoros/src/functions/marshal_protocol_version_from_sapi.legacy.php',
        'b0b88a3b89caae681462c58ff19a7059' => __DIR__ . '/..' . '/laminas/laminas-diactoros/src/functions/marshal_uri_from_sapi.legacy.php',
        'cc8e14526dc240491e17a838cb78508c' => __DIR__ . '/..' . '/laminas/laminas-diactoros/src/functions/normalize_server.legacy.php',
        '786bf90caabc9e09b6ad4cc5ca8f0e30' => __DIR__ . '/..' . '/laminas/laminas-diactoros/src/functions/normalize_uploaded_files.legacy.php',
        '751a5a3f463e4be759be31748b61737c' => __DIR__ . '/..' . '/laminas/laminas-diactoros/src/functions/parse_cookie_header.legacy.php',
        'c720f792236cd163ece8049879166850' => __DIR__ . '/..' . '/cakephp/cakephp/src/Core/functions.php',
        'ede59e3a405fb689cd1cebb7bb1db3fb' => __DIR__ . '/..' . '/cakephp/cakephp/src/Collection/functions.php',
        '90236b492da7ca2983a2ad6e33e4152e' => __DIR__ . '/..' . '/cakephp/cakephp/src/I18n/functions.php',
        'b1fc73705e1bec51cd2b20a32cf1c60a' => __DIR__ . '/..' . '/cakephp/cakephp/src/Utility/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\SimpleCache\\' => 16,
            'Psr\\Log\\' => 8,
            'Psr\\Http\\Message\\' => 17,
        ),
        'L' => 
        array (
            'Laminas\\ZendFrameworkBridge\\' => 28,
            'Laminas\\Diactoros\\' => 18,
        ),
        'C' => 
        array (
            'Cake\\Chronos\\' => 13,
            'Cake\\' => 5,
        ),
        'A' => 
        array (
            'Aura\\Intl\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\SimpleCache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/simple-cache/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Laminas\\ZendFrameworkBridge\\' => 
        array (
            0 => __DIR__ . '/..' . '/laminas/laminas-zendframework-bridge/src',
        ),
        'Laminas\\Diactoros\\' => 
        array (
            0 => __DIR__ . '/..' . '/laminas/laminas-diactoros/src',
        ),
        'Cake\\Chronos\\' => 
        array (
            0 => __DIR__ . '/..' . '/cakephp/chronos/src',
        ),
        'Cake\\' => 
        array (
            0 => __DIR__ . '/..' . '/cakephp/cakephp/src',
        ),
        'Aura\\Intl\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/intl/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite29d36cb62928a680742bd5ef827a6ed::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite29d36cb62928a680742bd5ef827a6ed::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite29d36cb62928a680742bd5ef827a6ed::$classMap;

        }, null, ClassLoader::class);
    }
}