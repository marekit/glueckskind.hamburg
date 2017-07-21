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
});
