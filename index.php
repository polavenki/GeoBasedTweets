<?php

require('../vendor/autoload.php');

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Our web handlers

$app->get('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return '<head><link rel="shortcut icon" href="./favicon.ico" type="image/x-icon"/></head><BODY style="background: #f3f3f3;text-align:center;margin-top:50px;">
  <div style="background: url(./images/top-logo.png) no-repeat;height: 45px; margin:auto;width: 98px;"></div>
  <br>
  <div><a href="/index.html" style="text-decoration:none;font-size:25px;">Search where your favorite tweets are coming from?</a></div>
 </BODY>';
});

$app->run();

?>