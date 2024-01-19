rm -rfv m5*
rm -rfv *.html

php download.php
unzip m5*.zip '*/boards.txt'
unzip m5*.zip '*/variants/*'

php createlist.php
php createlist_var.php

rm -rfv m5*
