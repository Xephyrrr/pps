<?php 

require_once 'theme-functions/Mobile-Detect/Mobile_Detect.php';

$detect = new Mobile_Detect();

if ($detect->isMobile()) {
	include 'mobile/services-pawning-mobile.php';
} else {
	include 'services-pawning-desktop.php';
}

?>