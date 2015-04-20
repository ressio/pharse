<?php
/**
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

if (version_compare(PHP_VERSION, '5.2.0', '<')) {
    /**
     * PHP alternative to array_fill_keys, for backwards compatibility
     * @param array $keys
     * @param mixed $value
     * @return array
     */
    function array_fill_keys($keys, $value)
    {
        $res = array();
        foreach ($keys as $k) {
            $res[$k] = $value;
        }

        return $res;
    }
}

include_once('pharse_tokenizer.php');
include_once('pharse_parser_html.php');
include_once('pharse_node_html.php');
include_once('pharse_selector_html.php');
include_once('pharse_formatter.php');

class Pharse
{
    /**
     * Returns HTML DOM from string
     * @param string $str
     * @param bool $return_root Return root node or return parser object
     * @return HTML_Parser_HTML5|HTML_Node
     */
    static public function str_get_dom($str, $return_root = true)
    {
        $a = new HTML_Parser_HTML5($str);
        return (($return_root) ? $a->root : $a);
    }

    /**
     * Returns HTML DOM from file/website
     * @param string $file
     * @param bool $return_root Return root node or return parser object
     * @param bool $use_include_path Use include path search in file_get_contents
     * @param resource $context Context resource used in file_get_contents
     * @return HTML_Parser_HTML5|HTML_Node
     */
    static public function file_get_dom($file, $return_root = true, $use_include_path = false, $context = null)
    {
        $f = file_get_contents($file, $use_include_path, $context);

        return (($f === false) ? false : self::str_get_dom($f, $return_root));
    }

    /**
     * Format/beautify DOM
     * @param HTML_Node $root
     * @param array $options Extra formatting options {@link HTML_Formatter::$options}
     * @return bool
     */
    static public function dom_format($root, $options = array())
    {
        $formatter = new HTML_Formatter($options);
        return $formatter->format($root);
    }
}
