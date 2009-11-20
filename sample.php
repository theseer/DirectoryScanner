<?php

  require 'src/scanner.php';
  require 'src/filter.php';

  $scanner = new \TheSeer\Tools\FileSystem\Scanner;
  $scanner->addInclude('*.php');
  $scanner->addExclude('*filter*');
  $scanner->addExclude('./src/*');

  foreach($scanner('.') as $i) {
     var_dump($i);
  }
