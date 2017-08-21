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
    static $attempts;

    if (!file_exists($path) || !is_readable($path)){
        if ($attempts > 2){
            die("Unable to open storage file for reading\n");
        }

        touch($path);
        $attempts++;
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
        $data = serialize($data).PHP_EOL;
    }

    $success = (bool) fputs($storage, $data);

    if ($closeAfter){
        closeConnection($storage);
    }

    return $success;
}