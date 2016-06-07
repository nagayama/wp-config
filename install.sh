BASEDIR=`pwd`
curl -o wp-config.php    https://raw.githubusercontent.com/nagayama/wp-config/master/wp-config.php 
curl -o local-config.php https://raw.githubusercontent.com/nagayama/wp-config/master/local-config-sample.php
curl -o index.php        https://raw.githubusercontent.com/nagayama/wp-config/master/index.php 
wp core download --path=wp --locale=ja --force
mkdir content/
cp -a wp/wp-content/* content/
cd $BASEDIR
