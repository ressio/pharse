# Introduction #

Ganon is designed for and written in PHP5, but there is also a PHP4 version available. All code in the repository is designed for PHP5 and a simple converter is used to make it compatible with PHP4. Although PHP4 isn't officially supported, a lot of features will still work with it. New bug reports for PHP4 will be taken into consideration and might be fixed if it doesn't require an overhaul of the current model. If you are using a PHP version older than 5.3.0, there are also a few points of attention.

_**NOTE**: Ganon is written in PHP version 5.3.1, if you are using a previous version of PHP5 and experience problems, please try the PHP4 version._


# Details #

Compared to the PHP5 version, there are a few things different in the PHP4 version that you have to take into account when using the PHP4 version of Ganon. If you are using a PHP version older than 5.3.0, please pay attention to the last point.

  * The extension of the PHP4 version is _".php4"_, remember this when including the file.
  * PHP4 knows no class constants, so they are converted to global constants (using _define()_) and names are prepended with _"`GAN_`"_. For example, this means that _`HTML_Node::NODE_TEXT`_ is converted to _`GAN_NODE_TEXT`_.
  * PHP4 knows no private/protected class variables and methods. This means everything is public. and accessible.
  * PHP4 does not support static methods or variables in classes. This means everything is converted to a public method or variable.
  * PHP only started supporting the magic invoke method since 5.3.0. If you are using an older version you need to call functions explicitly like _$html->select('`*`')_ or _$node->getAttribute('href')_. The constructor does not need to be called explicitly.
    * **HTML\_Formatter**
      * $n($node);  >>>  $n->format($node);
    * **HTML\_Node**
      * echo $n;  >>>  echo $n->tag;
      * echo $n->test;  >>>  echo $n->getAttribute('test');
      * $n->test = '123';  >>>  $n->setAttribute('test', '123');
      * isset($n->test);  >>>  $n->hasAttribute('test');
      * unset($n->test);  >>>  $n->deleteAttribute('test');
      * $n('`*`');  >>>  $n->select('`*`');
    * **HTML\_Parser**
      * $n('`*`');  >>>  $n->select('`*`');
      * echo $n;  >>>  echo $n->root->getInnerText();
    * **HTML\_Selector**
      * $n('`*`');  >>>  $n->select('`*`');
      * echo $n;  >>>  echo $n->query;