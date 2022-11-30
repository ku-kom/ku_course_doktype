<?php

/*
 * This file is part of the package ku_course_doktype.
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

defined('TYPO3') or die('Access denied.');

call_user_func(function ($extKey='ku_course_doktype', $table='pages') {
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

    // Register fields
    $GLOBALS['TCA']['pages']['columns'] = array_replace_recursive(
        $GLOBALS['TCA']['pages']['columns'],
        [
            'ku_course_about' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:'. $extKey .'/Resources/Private/Language/locallang_be.xlf:ku_course_about',
                'description' => 'LLL:EXT:'. $extKey .'/Resources/Private/Language/locallang_be.xlf:ku_course_details',
                'config' => [
                    'type' => 'text',
                    'enableRichtext' => true,
                    'rows' => 15,
                ],
            ],
            'ku_course_starttime' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:'. $extKey .'/Resources/Private/Language/locallang_be.xlf:ku_course_starttime',
                'description' => 'LLL:EXT:'. $extKey .'/Resources/Private/Language/locallang_be.xlf:ku_course_add_starttime',
                'config' => [
                    'type' => 'input',
                    'renderType' => 'inputDateTime',
                    'dbType' => 'date',
                    'eval' => 'date',
                ],
            ],
            'ku_course_level' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:'. $extKey .'/Resources/Private/Language/locallang_be.xlf:ku_course_level',
                'description' => 'LLL:EXT:'. $extKey .'/Resources/Private/Language/locallang_be.xlf:ku_course_add_level',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [
                        ['----',''],
                        ['Bachelor',1],
                        ['Kandidat',2],
                        ['Master',2],
                    ],
                ],
            ],
        ]
    );

    // Make fields visible in a new Course details tab:
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'pages',
        '--div--;LLL:EXT:'. $extKey .'/Resources/Private/Language/locallang_be.xlf:ku_course_tab,ku_course_about,ku_course_starttime, ku_course_level',
        116, // Course doktype id.
        ''
    );
});
