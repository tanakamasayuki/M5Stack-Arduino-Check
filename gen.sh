rm -rfv m5*
rm -rfv *.html

php download.php
unzip m5*.zip '*/boards.txt'

php createlist.php

rm -rfv m5*
