<?php
/**
 * Adding counters code after the body tag
 */

$event = $modx->event->name; // Check the event
if ( $event == 'OnWebPagePrerender' ) {

	$output = &$modx->resource->_output;
	if ( $modx->resource->getResourceTypeName() == 'document' && preg_match('/^\<!doctype html/u', mb_strtolower($output)) ) {

		$counters_code = ""; // Counters code to insert

		$yandex_metrika_id = $modx->getOption("msavanalyticstools.yandex_metrika");
		if ( preg_match( '/^\d+$/', $yandex_metrika_id ) ) {
			$counters_code .= $modx->getChunk("matYandexMetrika");
		}

		$pattern = '/\<(body|BODY)[^>]*\>/';
		$matches = null;
		if ( strlen($counters_code) > 0 && preg_match($pattern, $output, $matches) ) {
			$output = preg_replace( $pattern, $matches[0].$counters_code, $output);
		}

	}

}