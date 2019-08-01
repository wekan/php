php convert.php

sed -i "s|@import 'nib'||g" /home/user/repos/w/php/css/*.styl

stylus -w *.styl -o *.css

rm /home/user/repos/w/php/css/*.styl

cat /home/user/repos/w/php/css/*.styl > /home/user/repos/w/php/style.css
