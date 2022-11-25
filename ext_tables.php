<?php

/*
 * This file is part of the package ku_course_doktype.
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

defined('TYPO3') or die('Access denied.');

(function ($extKey='ku_course_doktype') {
    $courseDoktype = 116;
 
    // Add new page type:
    $GLOBALS['PAGES_TYPES'][$courseDoktype] = [
        'type' => 'web',
        'allowedTables' => '*',
    ];
 
 })();