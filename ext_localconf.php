<?php

/*
 * This file is part of the package ku_course_doktype.
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

defined('TYPO3') or die('Access denied.');

(function ($extKey='ku_course_doktype') {
    $courseDoktype = 116;

    // Provide icon for page tree, list view, etc. See Configuration/TCA/Overrides/pages.php
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry
        ->registerIcon(
            'ku-course-doktype-icon',
            TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            [
                'source' => 'EXT:' . $extKey . '/Resources/Public/Icons/Extension.svg',
            ]
        );
    $iconRegistry
        ->registerIcon(
            'ku-course-doktype-icon-contentFromPid',
            TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            [
                'source' => 'EXT:' . $extKey . '/Resources/Public/Icons/Extension.svg',
            ]
        );
    $iconRegistry
    ->registerIcon(
        'ku-course-doktype-icon-root',
        TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        [
            'source' => 'EXT:' . $extKey . '/Resources/Public/Icons/Extension.svg',
        ]
    );
    $iconRegistry
    ->registerIcon(
        'ku-course-doktype-icon-hideinmenu',
        TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        [
            'source' => 'EXT:' . $extKey . '/Resources/Public/Icons/Extension.svg',
        ]
    );

    // Allow backend users to drag and drop the new page type:
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
        'options.pageTree.doktypesToShowInNewPageDragArea := addToList(' . $courseDoktype . ')'
    );
})();
