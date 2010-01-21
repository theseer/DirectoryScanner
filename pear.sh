#!/bin/sh
rm -f Directory-Scanner*.tgz
mkdir -p TheSeer/DirectoryScanner
cp -r src/* TheSeer/DirectoryScanner
cd TheSeer/DirectoryScanner
/storage/php/Autoload/phpab.php -o autoload.php .
cd ../..
pear package
rm -rf TheSeer
