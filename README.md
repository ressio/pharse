# Pharse

Fastest PHP HTML Parser

---

The Pharse is fork of [Ganon](http://code.google.com/p/ganon) library and gives access to HTML/XML documents in a very simple object oriented way. It eases modifying the DOM and makes finding elements easy with CSS3-like queries.

Pharse is:

- A universal tokenizer
- A HTML/XML/RSS DOM Parser
    - Ability to manipulate elements and their attributes
    - Supports HTML5
    - Supports invalid HTML
    - Supports UTF8
    - Can perform advanced CSS3-like queries on elements (like jQuery -- namespaces supported)
- A HTML beautifier (like HTML Tidy)
    - Minify CSS and Javascript
    - Sort attributes, change character case, correct indentation, etc.
- Extensible
    - Parsing documents using callbacks based on current character/token
    - Operations separated in smaller functions for easy overriding
- Fast
- Easy


## Quick start

```php
include('path/pharse.php');

// Parse the google code website into a DOM
$html = Pharse::file_get_dom('http://code.google.com/');
```
After including Pharse and loading the DOM, it is time to get started.


### Access

Accessing elements is made easy through the CSS3-like selectors and the object model.
```php
// Find all the paragraph tags with a class attribute and print the
// value of the class attribute
foreach($html('p[class]') as $element) {
  echo $element->class, "<br>\n"; 
}

// Find the first div with ID "gc-header" and print the plain text of
// the parent element (plain text means no HTML tags, just the text)
echo $html('div#gc-header', 0)->parent->getPlainText();

// Find out how many tags there are which are "ns:tag" or "div", but not
// "a" and do not have a class attribute
echo count($html('(ns|tag, div + !a)[!class]');
```


### Modification

Elements can be easily modified after you've found them.
```php
// Find all paragraph tags which are nested inside a div tag, change
// their ID attribute and print the new HTML code
foreach($html('div p') as $index => $element) {
  $element->id = "id$index";
}
echo $html;

// Center all the links inside a document which start with "http://"
// and print out the new HTML
foreach($html('a[href ^= "http://"]') as $element) {
  $element->wrap('center');
}
echo $html;

// Find all odd indexed "td" elements and change the HTML to make them links
foreach($html('table td:odd') as $element) {
  $element->setInnerText('<a href="#">'.$element->getPlainText().'</a>');
}
echo $html;
```


### Beautify

Pharse can also help you beautify your code and format it properly.
```php
// Beautify the old HTML code and print out the new, formatted code
Pharse::dom_format($html, array('attributes_case' => CASE_LOWER));
echo $html;
```


## License

Pharse is licensed under the [Artistic License/GPL](http://dev.perl.org/licenses/)
