<?php
/**
 * Should output all Wiki articles and their information from the Ganon page
 * at Google Code (http://code.google.com/p/ganon/w/list)
 *
 * Demonstrates (advanced) selectors and nested queries
 *
 * @author RESS.IO Team
 * @package Pharse
 * @link https://github.com/ressio/pharse
 *
 * FORKED FROM
 * @author Niels A.D.
 * @package Ganon
 * @link http://code.google.com/p/ganon/
 *
 * @license http://dev.perl.org/licenses/artistic.html Artistic License
 */

include_once('../pharse.php');

/** @var HTML_Node $html */
$html = Pharse::file_get_dom('http://code.google.com/p/ganon/w/list');


if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
    //PHP 5.3.0 and higher

    foreach ($html('#resultstable tr[! id=headingrow]') as $row) {
        foreach ($row('td[class ^= "vt "]') as $col) {
            echo $col->getPlainText(), ' [', $col, "] <br>\n";
        }
        echo "<br>\n";
    }

} else {

    foreach ($html->select('#resultstable tr[! id=headingrow]') as $row) {
        foreach ($row->select('td[class ^= "vt "]') as $col) {
            echo $col->getPlainText(), ' [', $col, "] <br>\n";
        }
        echo "<br>\n";
    }

}

echo 'done';
