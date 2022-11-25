<?php

/*
 * This file is part of the package ku_course_doktype.
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

defined('TYPO3') or die('Access denied.');

(function ($extKey='ku_course_doktype', $table='pages') {
    $courseDoktype = 116;
 
    // Add new page type as possible select item:
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        $table,
        'doktype',
        [
            'LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang.xlf:course_page_type',
            $courseDoktype,
            'EXT:' . $extKey . '/Resources/Public/Icons/Extension.svg'
        ],
        '1',
        'after'
    );
 
    \TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule(
        $GLOBALS['TCA'][$table],
        [
            // add icon for new page type:
            'ctrl' => [
                'typeicon_classes' => [
                    $courseDoktype => 'ku-course-doktype-icon',
                    $courseDoktype . '-contentFromPid' => "ku-course-doktype-icon",
                    $courseDoktype . '-root' => "ku-course-doktype-icon",
                    $courseDoktype . '-hideinmenu' => "ku-course-doktype-icon",
                ],
            ],
            // add all page standard fields and tabs to your new page type
            'types' => [
                $courseDoktype => [
                    'showitem' => $GLOBALS['TCA'][$table]['types'][\TYPO3\CMS\Core\Domain\Repository\PageRepository::DOKTYPE_DEFAULT]['showitem']
                ]
            ]
        ]
    );
})();
