#!/bin/sh
rm -f Directory-Scanner*.tgz
mkdir -p TheSeer/DirectoryScanner
cp -r src/* TheSeer/DirectoryScanner
cp dist.php TheSeer/DirectoryScanner/autoload.php
pear package
rm -rf TheSeer
