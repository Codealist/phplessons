<?php
/**
 * @author Dmytro Samchuk <codealist@gmail.com>
 */

require_once __DIR__."/../app/bootstrap.php";
require_once ROOT."lib/fileutils.php";

$testFileDir = ROOT."app/files";
$existingTestFile = ROOT."app/files/test.mock";
assert(true  == isLeaf($existingTestFile));
assert(false == isLeaf($testFileDir));
assert(false  == isBranch($existingTestFile));
assert(true == isBranch($testFileDir));

$nodes = array_filter(
    glob($testFileDir."/*"),
    function($item){
        return '.' != $item && '..' != $item;
    });



