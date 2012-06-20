<?php
/**
 * The main template file.
 * Rout Layouts & Controls
 */

// DEFINE CONSTANTS
define('BASE_PATH', dirname(__FILE__));

// REQUIRE SCRIPTS
require(BASE_PATH.'/utils/mustache-templating.php');
?>

<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!-- Use the .htaccess and remove these lines to avoid edge case issues. More info: h5bp.com/i/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>BGT Partners</title>
  <meta name="description" content="">

  <!-- Mobile viewport optimized: h5bp.com/viewport -->
  <meta name="viewport" content="width=device-width">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
  
<?php echo <<<HTML
  <!-- STYLES -->
  <link rel="stylesheet" href="/wordpress-mustache-test//common/css/base.css">

  <!-- HEADER SCRIPTS -->
  <script src="/wordpress-mustache-test//common/js/libs/modernizr-2.5.3.min.js"></script>
HTML;
?>
  
</head>
<body>
  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6. chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

<a id="init" href="#">Test client side tempalting</a>
  
<?php echo <<<HTML
  <!-- JQUERY -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="/wordpress-mustache-test//common/js/libs/jquery-1.7.1.min.js"><\/script>')</script>

  <!-- PLUGINS -->
  <script src="/wordpress-mustache-test/common/js/libs/mustache.js"></script>

  <!-- MODULES -->

  <!-- LAYOUTS -->

  <!-- GLOBAL-->
  <script src="/wordpress-mustache-test/common/js/global.js"></script>
HTML;
?>


</body>
</html>