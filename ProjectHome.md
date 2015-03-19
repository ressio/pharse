# Ganon #
The Ganon library gives access to HTML/XML documents in a very simple object oriented way. It eases modifying the DOM and makes finding elements easy with CSS3-like queries.
<br><br>
Ganon is:<br>
<ul><li>A universal tokenizer<br>
</li><li>A HTML/XML/RSS DOM Parser<br>
<ul><li>Ability to manipulate elements and their attributes<br>
</li><li>Supports HTML5<br>
</li><li>Supports invalid HTML<br>
</li><li>Supports UTF8<br>
</li><li>Can perform advanced CSS3-like queries on elements (like jQuery -- namespaces supported) <a href='http://code.google.com/p/ganon/wiki/Selectors'><img src='http://www.gstatic.com/codesite/ph/images/tearoff_icon.gif' /></a>
</li></ul></li><li>A HTML beautifier (like HTML Tidy)<br>
<ul><li>Minify CSS and Javascript<br>
</li><li>Sort attributes, change character case, correct indentation, etc.<br>
</li></ul></li><li>Extensible<br>
<ul><li>Parsing documents using callbacks based on current character/token<br>
</li><li>Operations separated in smaller functions for easy overriding<br>
</li></ul></li><li>Fast<br>
</li><li>Easy</li></ul>

Ganon is designed for and written in PHP5, but there is also a PHP4 version available. All code in the repository is designed for PHP5 and a simple converter is used to make it compatible with PHP4. Although PHP4 isn't officially supported, a lot of features will still work with it. New bug reports for PHP4 will be taken into consideration and might be fixed if it doesn't require an overhaul of the current model. Learn <a href='PHP4.md'>more</a> about using Ganon with PHP4. <i><b>NOTE</b>: Ganon is written in PHP version 5.3.1, if you are using a previous version of PHP5 and experience problems, please try the PHP4 version.</i>

<br><br><br>

<h2>Quick start</h2>
<blockquote>First off, you need to <a href='GetGanon.md'>download</a> the latest version of Ganon.<br>
<pre><code> include('path/ganon.php');<br>
 <br>
 // Parse the google code website into a DOM<br>
 $html = file_get_dom('http://code.google.com/');<br>
</code></pre>
After including Ganon and loading the DOM, it is time to get started.<br>
<h4>Access</h4>
Accessing elements is made easy through the CSS3-like selectors and the object model.<br>
<pre><code> // Find all the paragraph tags with a class attribute and print the<br>
 // value of the class attribute<br>
 foreach($html('p[class]') as $element) {<br>
   echo $element-&gt;class, "&lt;br&gt;\n"; <br>
 }<br>
<br>
<br>
 // Find the first div with ID "gc-header" and print the plain text of<br>
 // the parent element (plain text means no HTML tags, just the text)<br>
 echo $html('div#gc-header', 0)-&gt;parent-&gt;getPlainText();<br>
<br>
<br>
 // Find out how many tags there are which are "ns:tag" or "div", but not<br>
 // "a" and do not have a class attribute<br>
 echo count($html('(ns|tag, div + !a)[!class]');<br>
</code></pre>
Learn <a href='AccesElements.md'>more</a> about accessing elements.<br>
<h4>Modification</h4>
Elements can be easily modified after you've found them.<br>
<pre><code> // Find all paragraph tags which are nested inside a div tag, change<br>
 // their ID attribute and print the new HTML code<br>
 foreach($html('div p') as $index =&gt; $element) {<br>
   $element-&gt;id = "id$index";<br>
 }<br>
 echo $html;<br>
<br>
<br>
 // Center all the links inside a document which start with "http://"<br>
 // and print out the new HTML<br>
 foreach($html('a[href ^= "http://"]') as $element) {<br>
   $element-&gt;wrap('center');<br>
 }<br>
 echo $html;<br>
<br>
<br>
 // Find all odd indexed "td" elements and change the HTML to make them links<br>
 foreach($html('table td:odd') as $element) {<br>
   $element-&gt;setInnerText('&lt;a href="#"&gt;'.$element-&gt;getPlainText().'&lt;/a&gt;');<br>
 }<br>
 echo $html;<br>
</code></pre>
Learn <a href='ModifyElements.md'>more</a> about modifying elements.<br>
<h4>Beautify</h4>
Ganon can also help you beautify your code and format it properly.<br>
<pre><code> // Beautify the old HTML code and print out the new, formatted code<br>
 dom_format($html, array('attributes_case' =&gt; CASE_LOWER));<br>
 echo $html;<br>
</code></pre></blockquote>

<br><br><br>

<h2>Related Projects</h2>
<ul><li><a href='http://simplehtmldom.sourceforge.net/'>PHP Simple HTML DOM</a> - This project started because Simple HTML DOM didn't perform quite well for me with complex HTML.<br>
</li><li><a href='http://code.google.com/p/phpquery/'>phpQuery</a> - This project started because phpQuery wasn't fast enough for me.<br>
</li><li><a href='http://php.net/manual/en/book.simplexml.php'>SimpleXML</a> - PHP extension with similar functionality for XML only.