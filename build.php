<?php

  require '../Autoload/src/classfinder.php';
  require '../Autoload/src/phpfilter.php';
  require '../Autoload/src/autoloadbuilder.php';

  require 'src/directoryscanner.php';
  require 'src/includeexcludefilter.php';
  require 'src/filesonlyfilter.php';

  $scanner = new \TheSeer\Tools\DirectoryScanner;
  $scanner->addInclude('*.php');

  $finder = new \TheSeer\Tools\ClassFinder;

  $found = $finder->parseMulti($scanner('src'));

  $ab = new \TheSeer\Tools\AutoloadBuilder($found);
  $ab->setBaseDir(realpath(__DIR__.'/..'));

  $ab->save('autoload.php');
  
  echo "Done.\n";

?>