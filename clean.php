<?php
function clean ($input) {
$output = stripslashes($input);
$output = htmlentities($output);	
return ($output);
}
