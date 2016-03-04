<?php 

require_once 'theme-functions/Mobile-Detect/Mobile_Detect.php';

$detect = new Mobile_Detect();

if ($detect->isMobile()) {
	include 'mobile/services-remittance-mobile.php';
} else {
	include 'services-remittance-desktop.php';
}

?>