<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:app/Resources/Private/Language/locallang_db.xlf:tx_app_domain_model_embroidertheme',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => true,
        'versioningWS' => 2,
        'versioning_followPages' => true,

        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'sortby' => 'sorting',
        'default_sortby' => 'ORDER BY title DESC',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title',
        'iconfile' => 'EXT:app/Resources/Public/Icons/General.svg',
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, title',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource;;1,
--palette--;LLL:EXT:app/Resources/Private/Language/locallang_db.xlf:tx_app_domain_model_embroidertheme.palette.data;data,
--palette--;LLL:EXT:app/Resources/Private/Language/locallang_db.xlf:tx_app_domain_model_embroidertheme.palette.categories;categories,
--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, hidden, starttime, endtime'],
    ],
    'palettes' => [
        '1' => ['showitem' => ''],
        'data' => ['showitem' => 'title, --linebreak--, image'],
        'categories' => ['showitem' => 'embroider_theme_categories'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => [
                    ['LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1],
                    ['LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0],
                ],
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_app_domain_model_embroidertheme',
                'foreign_table_where' => 'AND tx_app_domain_model_embroidertheme.pid=###CURRENT_PID### AND tx_app_domain_model_embroidertheme.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
            ],
        ],
        'starttime' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),
                ],
            ],
        ],
        'endtime' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),
                ],
            ],
        ],
        'title' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:app/Resources/Private/Language/locallang_db.xml:tx_app_domain_model_embroidertheme.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim, required',
            ],
        ],
        'image' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:app/Resources/Private/Language/locallang_db.xml:tx_app_domain_model_embroidertheme.image',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('image', [
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference',
                ],
                'minitems' => 0,
                'maxitems' => 1,
            ], $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']),
        ],
        'embroider_theme_categories' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:app/Resources/Private/Language/locallang_db.xml:tx_app_domain_model_embroidertheme.embroider_theme_categories',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'multiple' => 1,
                'foreign_table' => 'tx_app_domain_model_embroiderthemecategory',
                'MM' => 'tx_app_embroidertheme_embroiderthemecategory_mm',
                'foreign_table_where' => ' AND tx_app_domain_model_embroiderthemecategory.pid=###CURRENT_PID### ORDER BY tx_app_domain_model_embroiderthemecategory.title ',
                'minitems' => 0,
                'maxitems' => 99,
            ],
        ],
    ],
];
