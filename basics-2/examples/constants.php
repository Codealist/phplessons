<?php
/**
 * @author Dmytro Samchuk <codealist@gmail.com>
 */

define('MYSQL_PASSWORD', '87sdfhw7erjd8sd');
define('MYSQL_USER', 'user09283ps');

/*
 * cannot do this with constant
 * define('MYSQL_PASSWORD', '87sdfhw7erjd8sd');
 */


echo MYSQL_PASSWORD . PHP_EOL; # both user-defined and predefined

error_reporting(E_COMPILE_ERROR); # <-- also predefined constant

echo __LINE__; # magic predefined constant. Seems to be 13
echo __DIR__;  # magic predefined constant. Seems to be your current path (working directory)
echo __FILE__; # magic predefined constant. Seems to be constants.php