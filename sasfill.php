<?php
error_reporting(0);
function sf($ses) {
$fses = filter_var($ses, FILTER_SANITIZE_STRING);
return $fses; }
?>
