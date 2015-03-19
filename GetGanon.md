# Downloading #

There are several versions of Ganon available for [download](http://code.google.com/p/ganon/downloads/list).
  * **ZIP Archive** - Zipped version of the Ganon repository.
  * **Single file PHP4** - If you want to use Ganon with PHP4, this is the version you want.
  * **Single file PHP5** - A single file which combines all of Ganon's files into one. No comments and no third party libraries (this means no minification of Javascript).
  * **SVN** - It is possible to download the developers' version of Ganon using a subversion client like [TortoiseSVN](http://tortoisesvn.tigris.org/). You can browse through the code online [here](http://code.google.com/p/ganon/source/browse/).

Most of the users probably want to download either the **ZIP archive** or the **Single file for PHP5**.

<br><br>

<h1>Installation</h1>

Installing Ganon is very easy. Once you have downloaded Ganon, just place the file(s) in your working directory. If you have downloaded the archive then you'll need to unzip it first. Before you can use Ganon in your project, you'll have to <a href='http://php.net/manual/en/function.include.php'>include</a> it:<br>
<br>
<pre><code> include('path/ganon.php');<br>
</code></pre>

Replace "path" with the proper subfolder in which the Ganon files are located. If ganon.php is in the same folder as your project, then you can remove "path/". <br><br>
<b>Now you are ready to use Ganon in your project!</b>