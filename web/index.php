<?php 

ini_set('display_errors', 1);

require_once 'theme-functions/Mobile-Detect/Mobile_Detect.php';

$detect = new Mobile_Detect();

if ($detect->isMobile()) {
	include 'mobile/index-mobile.php';
} else {
	include 'index-desktop.php';
}

?>