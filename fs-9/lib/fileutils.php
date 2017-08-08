<?php
/**
 * @author Dmytro Samchuk <codealist@gmail.com>
 */



/*
 * === RecursiveFiles ===
 */

/**
 * @param string $path
 * @return bool
 */
function isLeaf($path)
{
    if (is_file(realpath($path))) {
        return true;
    }
    return false;
}

/**
 * @param string $path
 * @return bool
 */
function isBranch($path)
{
    if (is_dir(realpath($path))){
        return true;
    }
    return false;
}

/**
 * @param string $path
 * @param array &$result
 */
function getFilesTree($path, array &$result)
{
    if (isBranch($path)) {
        foreach (glob($path."/*") as $item) {
            getFilesTree($item, $result);
        }
    } elseif (isLeaf($path)) {
         $result[] = realpath($path);
    }
}

/*
 * ===/ RecursiveFiles /===
 */
