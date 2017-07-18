<?php
/**
 * Adding counters code after the body tag
 */

$event = $modx->event->name; // Check the event
if ( $event == 'OnWebPagePrerender' ) {

	$output = &$modx->resource->_output;

	if ( preg_match('/^\<!doctype html/u', mb_strtolower($output)) ) {

		$counters_code = ""; // Counters code to insert


		//
		// Yandex Metrika
		//
		$yandex_metrika_id = $modx->getOption("msavanalyticstools.yandex_metrika");
		if ( preg_match('/^\d+$/', $yandex_metrika_id) ) {
			$counters_code .= $modx->getChunk("matYandexMetrika");
		}


		//
		// Google Analytics
		//
		$google_analytics_id = $modx->getOption("msavanalyticstools.google_analytics");
		if ( preg_match('/^\w{2}-\d+-\d+$/', $google_analytics_id) ) {
			$counters_code .= $modx->getChunk("matGoogleAnalytics");
		}


		//
		// Mail.ru Counter
		//
		$mail_ru_counter = $modx->getOption("msavanalyticstools.mail_ru");
		if ( preg_match('/^\d+$/', $mail_ru_counter) ) {
			$counters_code .= $modx->getChunk("matMailRu");
		}


		//
		// Modify document source code
		//
		$pattern = '/\<(body|BODY)[^>]*\>/';
		$matches = null;
		if ( strlen($counters_code) > 0 && preg_match($pattern, $output, $matches) ) {
			$output = preg_replace( $pattern, $matches[0].$counters_code, $output);
		}

	}

}