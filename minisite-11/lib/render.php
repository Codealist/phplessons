<?php

/**
 * @param $path
 * @param array ...$context
 * @return string
 */
function renderTemplate($path, array $context = [])
{
    extract($context);
    ob_start();
    include $path;
    return ob_get_clean();
}

function getFullHtml($content, $layoutPath, array $layoutVars)
{
    $view["content"] = $content;
    $view["layout"] = $layoutVars;
    ob_start();
    include $layoutPath;
    return ob_get_clean();
}