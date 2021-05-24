sudo apt-get install libcurl4-openssl-dev pkg-config libssl-dev apache2-mod-php
sudo apt install php-pear
sudo pecl channel-update pecl.php.net
sudo pecl install mongodb
echo "php.ini add: extension=mongodb.so"
