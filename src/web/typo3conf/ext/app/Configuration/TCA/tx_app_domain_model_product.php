<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:app/Resources/Private/Language/locallang_db.xlf:tx_app_domain_model_product',
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
--palette--;LLL:EXT:app/Resources/Private/Language/locallang_db.xlf:tx_app_domain_model_product.palette.data;data,
--palette--;LLL:EXT:app/Resources/Private/Language/locallang_db.xlf:tx_app_domain_model_product.palette.images;images,
--palette--;LLL:EXT:app/Resources/Private/Language/locallang_db.xlf:tx_app_domain_model_product.palette.assigments;assigments,
--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, hidden, starttime, endtime'],
    ],
    'palettes' => [
        '1' => ['showitem' => ''],
        'data' => ['showitem' => 'title, price, delivery_time, --linebreak--, teaser_text, description'],
        'images' => ['showitem' => 'images, design_suggestions'],
        'assigments' => ['showitem' => 'product_categories, embroider_theme_suggestions'],

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
                'foreign_table' => 'tx_app_domain_model_product',
                'foreign_table_where' => 'AND tx_app_domain_model_product.pid=###CURRENT_PID### AND tx_app_domain_model_product.sys_language_uid IN (-1,0)',
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
            'label' => 'LLL:EXT:app/Resources/Private/Language/locallang_db.xml:tx_app_domain_model_product.title',
            'config' => [
                'type' => 'input',
                'size' => 100,
                'eval' => 'trim, required',
            ],
        ],
        'teaser_text' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:app/Resources/Private/Language/locallang_db.xml:tx_app_domain_model_product.teaser_text',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
            ],
        ],
        'description' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:app/Resources/Private/Language/locallang_db.xml:tx_app_domain_model_product.description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
            ],
        ],
        'price' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:app/Resources/Private/Language/locallang_db.xml:tx_app_domain_model_product.price',
            'config' => [
                'type' => 'input',
                'size' => 10,
                'eval' => 'trim, required',
            ],
        ],
        'delivery_time' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:app/Resources/Private/Language/locallang_db.xml:tx_app_domain_model_product.delivery_time',
            'config' => [
                'type' => 'input',
                'size' => 10,
                'eval' => 'trim',
            ],
        ],
        'product_categories' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:app/Resources/Private/Language/locallang_db.xml:tx_app_domain_model_product.product_categories',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'multiple' => 1,
                'foreign_table' => 'tx_app_domain_model_productcategory',
                'MM' => 'tx_app_product_productcategory_mm',
                'foreign_table_where' => ' AND tx_app_domain_model_productcategory.pid=###CURRENT_PID### ORDER BY tx_app_domain_model_productcategory.title ',
                'minitems' => 0,
                'maxitems' => 99,
            ],
        ],
        'images' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:app/Resources/Private/Language/locallang_db.xml:tx_app_domain_model_product.images',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('images', [
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference',
                ],
                'minitems' => 0,
                'maxitems' => 10,
            ], $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']),
        ],
        'design_suggestions' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:app/Resources/Private/Language/locallang_db.xml:tx_app_domain_model_product.design_suggestions',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('design_suggestions', [
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference',
                ],
                'minitems' => 0,
                'maxitems' => 10,
            ], $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']),
        ],
        'embroider_theme_suggestions' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:app/Resources/Private/Language/locallang_db.xml:tx_app_domain_model_product.embroider_theme_suggestions',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'multiple' => 1,
                'foreign_table' => 'tx_app_domain_model_embroidertheme',
                'MM' => 'tx_app_product_embroidertheme_mm',
                'foreign_table_where' => ' ORDER BY tx_app_domain_model_embroidertheme.title ',
                'minitems' => 0,
                'maxitems' => 99,
            ],
        ],
    ],
];
