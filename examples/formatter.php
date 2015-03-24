<!DOCTYPE html>
<!--
  -  Should output a minified and a formatted version of m.nos.nl
  -
  -  Demonstrates formatter and how to delete nodes
  -
  -  @author RESS.IO Team
  -  @package Pharse
  -  @link https://github.com/ressio/pharse
  -
  -  FORKED FROM
  -  @author Niels A.D.
  -  @package Ganon
  -  @link http://code.google.com/p/ganon/
  -
  -  @license http://dev.perl.org/licenses/artistic.html Artistic License
  -->
<html>

<h1>Minified HTML:</h1>

<?php
include_once('../pharse.php');

//Only keep everything between body tags, delete the rest.
/** @var HTML_Node $html */
$html = Pharse::file_get_dom('http://m.nos.nl');
$html->select('"!DOCTYPE"', 0)->delete();
$html->select('head', 0)->delete();
$html->select('body', 0)->detach(true);
$html->select('html', 0)->detach(true);

//Minified version
HTML_Formatter::minify_html($html);
echo "$html\n";
?>

<h1>Formatted HTML:</h1>

<?php
//Formatted version
$formatter = new HTML_Formatter(array('sort_attributes' => false, 'attributes_case' => CASE_UPPER));
$formatter->format($html);
echo "$html\n";
?>

</html>