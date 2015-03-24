<?php
/**
 * Should output the most viewed video of the day on Youtube
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
$html = Pharse::file_get_dom('http://www.youtube.com/videos');


if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
    //PHP 5.3.0 and higher

    echo $html('a[href ^= "/watch"]:has(img)', 0)->toString();

} else {

    echo $html->select('a[href ^= "/watch"]:has(img)', 0)->toString();

}
