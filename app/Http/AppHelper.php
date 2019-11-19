<?php
/**
 * Get the path to the public folder.
 *
 * @param  string  $path
 * @return string
 */
function public_path($path = '')
{
    return base_path().'/public';
}