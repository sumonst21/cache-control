<?php
/**
 * Source: https://www.sitepoint.com/caching-php-performance/
 */
//The header that’s easiest to implement is the `Expires` header–we use it to set a date on which the page will expire, and until that time, web browsers are allowed to use a cached version of the page. Here’s an example of this header at work:
function setExpires($expires) {
header(
'Expires: '.gmdate('D, d M Y H:i:s', time()+$expires).'GMT');
}
setExpires(10);
echo ( 'This page will self destruct in 10 seconds<br />' );
echo ( 'The GMT is now '.gmdate('H:i:s').'<br />' );
echo ( '<a href="'.$_SERVER['PHP_SELF'].'">View Again</a><br />' );

//In this example, we created a custom function called setExpires that sets the HTTP Expires header to a point in the future, defined in seconds. The output of the above example shows the current time in GMT, and provides a link that allows us to view the page again. If we follow this link, we’ll notice the time updates only once every ten seconds. If you like, you can also experiment by using your browser’s Refresh button to tell the browser to refresh the cache, and watching what happens to the displayed date.
?>
