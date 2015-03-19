### Introduction ###

Ganon has a powerful set of tools to access the DOM elements. The most important one, and the one you will probably use the most, is the CSS Selector support. Ganon can "select" nodes using CSS3 compliant queries. Ganon can also iterate over all childnodes and attributes, gives easy access to the parent/siblings and it gives easy access to the HTML code, inner text and plain text.

_**NOTE**: Ganon is written in PHP version 5.3.1. If you are using a previous version of PHP5, please read [this](PHP4.md) first!_

<br><br>

<h3>Select</h3>

<blockquote>CSS select queries are easy to select specific nodes. Ganon <a href='Selectors.md'>supports</a> most of the CCS3 selectors and has added some new ones.<br>
<pre><code>// To use a CSS selector query on a node, you simply use the node as a function.<br>
// The result will be stored in an array (of nodes).<br>
$match_array = $node('.myclass');<br>
<br>
<br>
// To iterate the result, you can use foreach<br>
foreach($match_array as $element) {<br>
  echo $element, "&lt;br&gt;\n"; <br>
}<br>
<br>
<br>
// The above can be shortened to the following<br>
foreach($node('.myclass') as $element) {<br>
  echo $element, "&lt;br&gt;\n"; <br>
}<br>
<br>
<br>
// Because $element is also a node, you can also perform a query on that node<br>
// and nest queries<br>
foreach($node('.myclass') as $element) {<br>
  foreach($element('.myotherclass') as $new_element) {<br>
    echo $new_element, "&lt;br&gt;\n"; <br>
  }<br>
}<br>
<br>
// If you know which element of the array you<br>
// are going to need, you can pass an index to the function<br>
$a = $node('a', 2);<br>
// A negative index will start counting from the end of the array<br>
$a = $node('a', -1);<br>
</code></pre></blockquote>

<br><br>

<h3>Near Nodes</h3>

<blockquote>Besides using selectors, you can also use other methods to access near nodes. You have access to the parent node, the child nodes and the node's siblings.<br>
<pre><code>// Iterate over childnodes<br>
for ($i = 0; $i &lt; $node-&gt;childCount(); $i++) {<br>
  echo $node-&gt;getChild($i);<br>
}<br>
<br>
<br>
// Get parent<br>
echo $node-&gt;parent;<br>
<br>
<br>
// Get Siblings<br>
$above = $node-&gt;getSibling(-1); //previous node<br>
$beneath = $node-&gt;getSibling(1); //next node<br>
</code></pre></blockquote>

<br><br>

<h3>Attributes</h3>

<blockquote>Attributes are very easy to access. They are not stored in separate objects, but rather in an array.<br>
<pre><code>// Attributes are very easy to access,<br>
// just access it as if it were an attribute of the object<br>
$href = $node-&gt;href; <br>
$id = $node-&gt;id;<br>
<br>
<br>
// Iterate over attributes<br>
foreach($node-&gt;attributes as $attribute =&gt; $value) {<br>
  echo $attribute, ' = ', $value, "&lt;br&gt;\n"; <br>
}<br>
</code></pre></blockquote>

<br><br>

<h3>Other</h3>

<blockquote>Here are some other useful functions of Ganon:<br>
<pre><code>// Full Tag<br>
echo $node-&gt;tag;<br>
<br>
<br>
// Tag Type (without namespace)<br>
echo $node-&gt;getTag();<br>
<br>
<br>
// Namespace<br>
echo $node-&gt;getNamespace();<br>
<br>
<br>
// Get namespace of attribute<br>
echo $node-&gt;getAttributeNS('href');<br>
<br>
<br>
// Location<br>
echo $node-&gt;dumpLocation();<br>
<br>
<br>
// Full HTML of node<br>
echo $node-&gt;html();<br>
<br>
<br>
// Inner Text<br>
echo $node-&gt;getInnerText();<br>
<br>
<br>
// Plain Text<br>
echo $node-&gt;getPlainText();<br>
<br>
<br>
// Index of node (in Parent)<br>
echo $node-&gt;index();<br>
<br>
<br>
// Indent<br>
echo $node-&gt;indent();<br>
<br>
<br>
// First/Last child<br>
echo $node-&gt;firstChild();<br>
echo $node-&gt;lastChild();<br>
</code></pre>