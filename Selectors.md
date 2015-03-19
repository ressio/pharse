# Introduction #

Ganon supports CSS3-like selectors to find certain elements. Learn more about CSS3 selectors [here](http://www.w3.org/TR/css3-selectors/#selectors) and [here](http://api.jquery.com/category/selectors/).

Default CSS3 selector support:

| **Pattern** | **Meaning** | **Supported** |
|:------------|:------------|:--------------|
| `*` | any element | **yes** |
| E | an element of type E | **yes** |
| E`[foo]` | an E element with a "foo" attribute | **yes** |
| E`[foo="bar"]` | an E element whose "foo" attribute value is exactly equal to "bar" | **yes** |
| E`[foo~="bar"]` | an E element whose "foo" attribute value is a list of whitespace-separated values, one of which is exactly equal to "bar" | **yes** |
| E`[foo^="bar"]` | an E element whose "foo" attribute value begins exactly with the string "bar" | **yes** |
| E`[foo$="bar"]` | an E element whose "foo" attribute value ends exactly with the string "bar" | **yes** |
| E`[foo*="bar"]` | an E element whose "foo" attribute value contains the substring "bar" | **yes** |
| E`[foo|="en"]` | an E element whose "foo" attribute has a hyphen-separated list of values beginning (from the left) with "en" | **yes** |
| E:root | an E element, root of the document | **yes** |
| E:nth-child(n) | an E element, the n-th child of its parent | **yes** |
| E:nth-last-child(n) | an E element, the n-th child of its parent, counting from the last one | **yes** |
| E:nth-of-type(n) | an E element, the n-th sibling of its type | **yes** |
| E:nth-last-of-type(n) | an E element, the n-th sibling of its type, counting from the last one | **yes** |
| E:first-child | an E element, first child of its parent | **yes** |
| E:last-child | an E element, last child of its parent | **yes** |
| E:first-of-type | an E element, first sibling of its type | **yes** |
| E:last-of-type | an E element, last sibling of its type | **yes** |
| E:only-child | an E element, only child of its parent | **yes** |
| E:only-of-type | an E element, only sibling of its type | **yes** |
| E:empty | an E element that has no children (including text nodes) | **yes** |
| E:link |  | no |
| E:visited | an E element being the source anchor of a hyperlink of which the target is not yet visited (:link) or already visited (:visited) | no |
| E:active |  | no |
| E:hover |  | no |
| E:focus | an E element during certain user actions | no |
| E:target | an E element being the target of the referring URI | no |
| E:lang(fr) | an element of type E in language "fr" (the document language specifies how language is determined) | **yes** |
| E:enabled |  | no |
| E:disabled | a user interface element E which is enabled or disabled | no |
| E:checked | a user interface element E which is checked (for instance a radio-button or checkbox) | no |
| E::first-line | the first formatted line of an E element | no |
| E::first-letter | the first formatted letter of an E element | no |
| E::before | generated content before an E element | no |
| E::after | generated content after an E element | no |
| E.warning | an E element whose class is "warning" (the document language specifies how class is determined). | **yes** |
| E#myid | an E element with ID equal to "myid". | **yes** |
| E:not(s) | an E element that does not match selector s | **yes** |
| E F | an F element descendant of an E element | **yes** |
| E > F | an F element child of an E element | **yes** |
| E + F | an F element immediately preceded by an E element | **yes** |
| E ~ F | an F element preceded by an E element | **yes** |

<br>
Added selectors:<br>
<br>
<table><thead><th> <b>Pattern</b> </th><th> <b>Meaning</b> </th></thead><tbody>
<tr><td> (!E) </td><td> an element of type other than E </td></tr>
<tr><td> (E, F) </td><td> an element of type E or F </td></tr>
<tr><td> (!E + !F) </td><td> an element of type other than E and F </td></tr>
<tr><td> E<code>[foo!="bar"]</code> </td><td> an E element whose "foo" attribute value is not equal to "bar" </td></tr>
<tr><td> E<code>[foo&gt;="2"]</code> </td><td> an E element whose "foo" attribute value is bigger than "2" </td></tr>
<tr><td> E<code>[foo&lt;="2"]</code> </td><td> an E element whose "foo" attribute value is smaller than "2" </td></tr>
<tr><td> E<code>[foo%="[^123]+"]</code> </td><td> an E element whose "foo" attribute value matches the regex <code>"[^123]+"</code> </td></tr>
<tr><td> E<code>[! foo]</code> </td><td> an E element without a "foo" attribute </td></tr>
<tr><td> E<code>[! foo$="bar"]</code> </td><td>  </td></tr>
<tr><td> E<code>[foo, bar]</code> </td><td> an E element with either a "foo" attribute or a "bar" attribute </td></tr>
<tr><td> E<code>[foo="bar", foo="123"]</code> </td><td>  </td></tr>
<tr><td> E<code>[foo + bar]</code> </td><td> an E element with a "foo" attribute and a "bar" attribute </td></tr>
<tr><td> E<code>[foo="bar" + bar="123"]</code> </td><td>  </td></tr>
<tr><td> E:eq(n) </td><td> an E element, the n-th child of its parent </td></tr>
<tr><td> E:gt(n) </td><td> an E element, greater than the n-th child of its parent </td></tr>
<tr><td> E:lt(n) </td><td> an E element, lower than the n-th child of its parent </td></tr>
<tr><td> E:odd </td><td> an E element which has an odd index </td></tr>
<tr><td> E:even </td><td> an E element which has an even index </td></tr>
<tr><td> E:every(n) </td><td> every n-th child E element of its parent </td></tr>
<tr><td> E:not-empty </td><td> an E element that children (including text nodes) </td></tr>
<tr><td> E:has-text </td><td> an E element that has text nodes </td></tr>
<tr><td> E:no-text </td><td> an E element that has no text nodes </td></tr>
<tr><td> E:contains(t) </td><td> an E element which contains the text of t </td></tr>
<tr><td> E:has(s) </td><td> an E element which has children that match the selector s </td></tr>
<tr><td> E:not(s) </td><td> an E element that does not match the selector s </td></tr>
<tr><td> <code>*</code>:element </td><td> element is an element node (that means no text, comments, doctype, etc.) </td></tr>
<tr><td> <code>*</code>:text </td><td> element is a text node </td></tr>
<tr><td> <code>*</code>:comment </td><td> element is a comment node </td></tr>