<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'Cake/Localized' => $baseDir . '/vendor/cakephp/localized/',
        'CsvView' => $baseDir . '/vendor/friendsofcake/cakephp-csvview/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'Search' => $baseDir . '/vendor/friendsofcake/search/',
        'localized' => $baseDir . '/plugins/localized/',
        'src' => $baseDir . '/plugins/src/',
        'vendor' => $baseDir . '/plugins/vendor/'
    ]
];