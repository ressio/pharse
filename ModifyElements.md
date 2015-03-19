### Introduction ###

Ganon has a powerful set of tools to modify the DOM elements. It gives easy access to the namespace/tag, attributes, index, etc.

_**NOTE**: Ganon is written in PHP version 5.3.1. If you are using a previous version of PHP5, please read [this](PHP4.md) first!_

<br><br>

<h3>Tag/Namespace</h3>

<blockquote>The tag type and namespace are easy to modify using Ganon:<br>
<pre><code>//set tag without namespace<br>
$node-&gt;setTag('title');<br>
<br>
<br>
//set tag with namespace<br>
$node-&gt;setTag('abc:title', true);<br>
<br>
<br>
//set namespace<br>
$node-&gt;setNamespace('abc');<br>
<br>
<br>
//set namespace of attribute<br>
$node-&gt;setAttributeNS('href', 'abc');<br>
</code></pre></blockquote>

<br><br>

<h3>Attributes</h3>

<blockquote>Attributes are very easy to modify. They are not stored in separate objects, but rather in an array.<br>
<pre><code>// Attributes are very easy to modify,<br>
// just set it as if it were an attribute of the object<br>
$node-&gt;id = 'myid'; <br>
$node-&gt;class = 'myclass';<br>
<br>
<br>
//Add/Delete attributes<br>
$node-&gt;addAttribute('href', 'www.test.com');<br>
$node-&gt;href = 'www.test.com';<br>
$node-&gt;deleteAttribute('href');<br>
$node-&gt;href = null;<br>
</code></pre></blockquote>

<br><br>

<h3>Other</h3>

<blockquote>Here are some other useful functions of Ganon:<br>
<pre><code>// Wrap node in new node<br>
$node-&gt;wrap('center');<br>
$node-&gt;wrap($otherNode);<br>
$node-&gt;wrapInner('center');<br>
$node-&gt;wrapInner($otherNode);<br>
<br>
<br>
// Delete child<br>
$node-&gt;deleteChild(2);<br>
<br>
<br>
// Change Parent<br>
$node-&gt;changeParent($otherNode);<br>
<br>
<br>
// Detach<br>
$node-&gt;detach();<br>
// Detach and move children level up<br>
$node-&gt;detach(true);<br>
<br>
<br>
// Clear<br>
$node-&gt;clear();<br>
<br>
<br>
// Change HTML<br>
$node-&gt;setOuterText('&lt;a&gt;New&lt;/a&gt;');<br>
$node-&gt;setInnerText('&lt;a&gt;New&lt;/a&gt;');<br>
$node-&gt;setPlainText('New Plain Text');<br>
</code></pre>