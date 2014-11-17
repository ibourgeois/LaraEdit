LaraEdit <img src="https://travis-ci.org/iBourgeois/LaraEdit.svg?branch=master" />
===========

IDE Package for Laravel


Screenshots
===========
Code Editor View:
<img src="https://github.com/iBourgeois/LaraEdit/blob/master/source/LaraEdit.png" />

Terminal Emulator View:
<img src="https://github.com/iBourgeois/LaraEdit/blob/master/source/LaraEdit2.png" />


Install
=======

#### 1 - Add the following requirement to your <code>composer.json</code> file:

For the latest development version:
<pre>"ibourgeois/laraedit": "dev-master"</pre>

For the latest stable version:
<pre>"ibourgeois/laraedit": "0.0.1"</pre>


#### 2 - Add the following service provider to your <code>/app/config/app.php</code> file:

<pre>'Ibourgeois\Laraedit\LaraeditServiceProvider',</pre>

#### 3 - Run the following command to publish the package assets:

<pre>php artisan asset:publish ibourgeois/laraedit</pre>

#### 4 - Open LaraEdit in your browser:
<pre>The default route is <code>/laraedit</code></pre>


LaraEdit is not yet to an installable state. Attempt installation at your own risk.


Info
====

I am still converting my source code to a Laravel Package and uploading files as I go. To see what I am building, check out my YouTube videos (playlist): http://youtu.be/q1kUxYe6JcQ?list=PL-eVEjqk2Kwie7PqhhkO3iFe7GORgxPvB

I have added the original source code inside the <code>source</code> folder. As the files in this folder are refactored and moved into the actual package, I will remove them from the source. 

If you want to test out the current functionality, just copy the source folder to your development server and open index.php in your browser. 

<code>Warning: Things may or may not work as expected as some configurations were made for my development box.</code>

Links
=====
* <a href="https://packagist.org/packages/ibourgeois/laraedit">Packagist</a>
* <a href="http://packalyst.com/packages/package/ibourgeois/laraedit">Packalyst</a>
* <a href="https://travis-ci.org/iBourgeois/LaraEdit">Travis CI</a>


Credits
=========================

<ul>
  <li><a href="http://jquery.com/">jQuery 1.11.1</a></li>
  <li><a href="http://getbootstrap.com/">Bootstrap 3.3.1</a></li>
  <li><a href="http://ace.c9.io/">Ace 1.1.8</a></li>
  <li><a href="http://fortawesome.github.io/Font-Awesome/">Font Awesome 4.2.0</a></li>
  <li><a href="http://jqueryui.com/">jQuery UI 1.11.2</a></li>
  <li><a href="http://www.jstree.com/">jsTree 3.0.8</a></li>
  <li><a href="https://github.com/Fluidbyte/PHP-jQuery-Terminal-Emulator">Fluidbyte PHP Terminal</a></li>
</ul>
