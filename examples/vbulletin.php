<?php
/**
 * Should output all sections from the SRL forums (http://villavu.com/forum/)
 *
 * Demonstrates selectors
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
$html = Pharse::file_get_dom('http://villavu.com/forum/');


if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
    //PHP 5.3.0 and higher

    foreach ($html('a[href ^= forumdisplay] > strong') as $element) {
        echo $element->getPlainText(), "<br>\n";
    }

} else {

    foreach ($html->select('a[href ^= forumdisplay] > strong') as $element) {
        echo $element->getPlainText(), "<br>\n";
    }

}
