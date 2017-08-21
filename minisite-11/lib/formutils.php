<?php
/**
 * @author Dmytro Samchuk <codealist@gmail.com>
 */
namespace form;

/**
 * @param string &$in
 * @param array $restricted
 * @return mixed
 */
function censor($in, array $restricted)
{
    return str_ireplace($restricted, "**censored**", $in);
}

/**
 * @param string $in
 * @return string
 */
function escapeTags($in)
{
    return htmlentities($in);
}