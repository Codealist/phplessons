<?php

echo "ALL levels reported.";
error_reporting(E_ALL);
echo " Not displayed in stdout \n";
ini_set('display_errors', 0); # don't display
# raise warning
fopen('non-existing_file', 'r');


echo "ALL levels reported.";
echo " Displayed in stdout \n";
ini_set('display_errors', 1); # display
# raise warning
fopen('non-existing_file', 'r');


echo "Only ERRORS reported.";
error_reporting(E_ERROR);
echo " Displayed in stdout \n";
# raise warning
fopen('non-existing_file', 'r');


echo "Only NOTICES reported.";
error_reporting(E_NOTICE);
echo " Displayed in stdout \n";
# raise warning
fopen('non-existing_file', 'r');


echo "Only WARNINGS reported.";
error_reporting(E_WARNING);
echo " Displayed in stdout \n";
# raise warning
fopen('non-existing_file', 'r');


echo "Only WARNINGS and NOTICES reported.";
error_reporting(E_WARNING | E_NOTICE);
echo " Displayed in stdout \n";
# raise warning
fopen('non-existing_file', 'r');

