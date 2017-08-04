<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(function () {
    /**
     * Add static typoscript template files
     */
    TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        'app', 'Configuration/TypoScript', 'Project: Glückskind hamburg'
    );

    TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
        <INCLUDE_TYPOSCRIPT: source="FILE:EXT:app/Configuration/TSconfig/Page/Master.tsconfig">
    ');

    /**
     * Add configuration LL reference file for custom system records
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_app_domain_model_productcategory',
        'EXT:app/Resources/Private/Language/locallang_csh_tx_app_domain_model_productcategory.xlf');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_app_domain_model_embroiderthemecategory',
        'EXT:app/Resources/Private/Language/locallang_csh_tx_app_domain_model_embroiderthemecategory.xlf');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_app_domain_model_embroidertheme',
        'EXT:app/Resources/Private/Language/locallang_csh_tx_app_domain_model_embroidertheme.xlf');
});
