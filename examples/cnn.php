<?php
/**
 * Should output all CNN Headlines
 *
 * Demonstrates advanced selectors
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
$html = Pharse::file_get_dom('http://www.cnn.com/');

if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
    //PHP 5.3.0 and higher

    foreach ($html('div:has(h4) (li, h4)') as $element) {

        if ($element->tag === 'h4') {
            echo '<b>', $element->getPlainText(), '</b>';
        } else {
            echo $element->getPlainText();
        }
        echo "<br>\n";
    }

} else {

    foreach ($html->select('div:has(h4) (li, h4)') as $element) {

        if ($element->tag === 'h4') {
            echo '<b>', $element->getPlainText(), '</b>';
        } else {
            echo $element->getPlainText();
        }
        echo "<br>\n";
    }

}
