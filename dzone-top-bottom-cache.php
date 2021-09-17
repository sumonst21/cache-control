<?php
/**
 * This is a mult file php script I just collected and simply explained in one file. 
 * Source: https://dzone.com/articles/how-to-create-a-simple-and-efficient-php-cache
 */


/**
 * The top-cache.php File
 */
$url = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $url);
$file = $break[count($break) - 1];
$cachefile = 'cached-'.substr_replace($file ,"",-4).'.html';
$cachetime = 18000;

// Serve from the cache if it is younger than $cachetime
if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    echo "<!-- Cached copy, generated ".date('H:i', filemtime($cachefile))." -->\n";
    readfile($cachefile);
    exit;
}
ob_start(); // Start the output buffer


/**
 * The bottom-cache.php File
 */
// Cache the contents to a cache file
$cached = fopen($cachefile, 'w');
fwrite($cached, ob_get_contents());
fclose($cached);
ob_end_flush(); // Send the output to the browser


/**
 * Include Cache Files On Your Page
 * the top-cache.php file must be included at the beginning of your PHP page and the bottom-cache.php at the end, as shown below:
 */
include('top-cache.php'); 

// Your regular PHP code goes here

include('bottom-cache.php');
