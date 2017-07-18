<?php
/**
 * Adding analytics code before the closing HEAD tag.
 */
$event = $modx->event->name; // Check the event
if ( $event == "OnWebPageInit" ) {

	//
	// Facebook Pixel
	//
	$facebook_pixel_id = $modx->getOption("msavanalyticstools.facebook_pixel");
	if ( preg_match('/^\d+$/', $facebook_pixel_id) ) {
		$modx->regClientStartupHTMLBlock( $modx->getChunk("matFacebookPixel") );
	}

}