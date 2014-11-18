LaraEdit <a href="https://travis-ci.org/iBourgeois/LaraEdit"><img src="https://travis-ci.org/iBourgeois/LaraEdit.svg?branch=master" /></a> [![License](https://poser.pugx.org/ibourgeois/laraedit/license.svg)](https://packagist.org/packages/ibourgeois/laraedit) [![Total Downloads](https://poser.pugx.org/ibourgeois/laraedit/downloads.svg)](https://packagist.org/packages/ibourgeois/laraedit) [![Latest Stable Version](https://poser.pugx.org/ibourgeois/laraedit/v/stable.svg)](https://packagist.org/packages/ibourgeois/laraedit)
===========

LaraEdit is an IDE Package for Laravel complete with a code editor and terminal, pre-configured for the Laravel Homestead environment. Updating the default configuration will allow LaraEdit to work in other development environments. 

<pre>Warning: DO NOT INSTALL LARAEDIT IN A PRODUCTION ENVIRONMENT. THIS IS FOR DEVELOPMENT ONLY! YOU'VE BEEN WARNED!</pre>


Screenshots
===========
Code Editor View:
<img src="https://github.com/iBourgeois/LaraEdit/blob/master/public/img/LaraEdit.png" />

Terminal Emulator View:
<img src="https://github.com/iBourgeois/LaraEdit/blob/master/public/img/LaraEdit2.png" />


Install
=======

#### 1 - Add the following requirement to your <code>composer.json</code> file:

For the latest development version:
<pre>"ibourgeois/laraedit": "dev-master"</pre>

For the latest stable version:
<pre>"ibourgeois/laraedit": "0.0.2"</pre>


#### 2 - Add the following service provider to your <code>/app/config/app.php</code> file:

<pre>'Ibourgeois\Laraedit\LaraeditServiceProvider',</pre>

#### 3 - Run the following command to publish the package assets:

<pre>php artisan asset:publish ibourgeois/laraedit</pre>

#### 4 - Open LaraEdit in your browser:
<pre>The default route is <code>/laraedit</code></pre>


Info
====
To see LaraEdit in action before you install it, check out my YouTube videos (playlist): http://youtu.be/q1kUxYe6JcQ?list=PL-eVEjqk2Kwie7PqhhkO3iFe7GORgxPvB


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
