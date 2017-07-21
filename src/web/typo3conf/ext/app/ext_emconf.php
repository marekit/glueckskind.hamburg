<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Project: Glückskind hamburg',
    'description' => 'Project provider extension for Glückskind hamburg',
    'category' => 'templates',
    'version' => '1.0.0',
    'state' => 'stable',
    'author' => 'Marc Hauschildt',
    'author_email' => 'marc.hauschildt@me.com',
    'author_company' => 'Glückskind hamburg',
    'constraints' => [
        'depends' => [
            'typo3' => '>=8.7',
            'cms' => '',
            'extbase' => '',
            'vhs' => '',
        ],
        'conflicts' => [
        ],
        'suggests' => [],
    ],
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'autoload' => [
        'psr-4' => ['Mh\\App\\' => 'Classes'],
    ],
];
