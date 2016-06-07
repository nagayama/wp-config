cd $(dirname $0)

curl -O https://raw.githubusercontent.com/nagayama/wp-config/master/wp-config.php 
curl -O https://raw.githubusercontent.com/nagayama/wp-config/master/local-config-sample.php
mkdir -p content/themes
mkdir wp
cd wp/
wp core download --locale=ja --force
