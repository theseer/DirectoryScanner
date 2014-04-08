#!/bin/sh
rm -f Directory-Scanner*.tgz
mkdir -p TheSeer/DirectoryScanner
cp -r src/* TheSeer/DirectoryScanner
cp dist.php TheSeer/DirectoryScanner/autoload.php
cp LICENSE phpunit.xml.dist TheSeer/DirectoryScanner
pear package
rm -rf TheSeer
