<?php 

require_once 'theme-functions/Mobile-Detect/Mobile_Detect.php';

$detect = new Mobile_Detect();

if ($detect->isMobile()) {
	include 'mobile/media-mobile.php';
} else {
	include 'media-desktop.php';
}

?>