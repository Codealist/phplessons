<?php
/**
 * @author Dmytro Samchuk <codealist@gmail.com>
 */
namespace storage;

/**
 * @param string $path
 * @return resource
 */
function connectForRead($path)
{
    $path = realpath($path);
    if (!file_exists($path) || !is_readable($path)){
        die("Unable to open storage file for reading\n");
    }

    if (false === $f = fopen($path, 'r')){
        die("Unable to connect to storage file for reading\n");
    }

    return $f;
}

/**
 * @param string $path
 * @return resource
 */
function connectForWrite($path)
{
    $path = realpath($path);
    if (!file_exists($path) || !is_writable($path)){
        die("Unable to open storage file for writing\n");
    }

    if (false === $f = fopen($path, 'a')){
        die("Unable to connect to storage file for writing\n");
    }

    return $f;
}

/**
 * @param resource $f
 */
function closeConnection($f)
{
    if (!fclose($f)){
        die("Connection was not closed\n");
    }
}

/**
 * @param resource $storage
 * @param mixed $data
 * @param bool $closeAfter
 * @return bool
 */
function insertRow($storage, $data, $closeAfter = false)
{
    if (is_array($data) || is_object($data)){
        $data = serialize($data);
    }

    return (bool) fputs($storage, $data);
}