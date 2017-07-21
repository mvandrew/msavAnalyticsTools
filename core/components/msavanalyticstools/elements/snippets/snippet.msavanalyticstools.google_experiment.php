<?php
/**
 * Google Experiment Code
 */
$is_active = $modx->getOption('is_active', $scriptProperties, '0');
$ex_key = $modx->getOption('ex_key', $scriptProperties, '');
$output = '';

/**
 * @var msavAnalyticsTools
 */
$msavanalyticstools = $modx->getService(
	"msavanalyticstools",
	"msavAnalyticsTools",
	$modx->getOption(
		"msavanalyticstools.core_path",
		null,
		$modx->getOption("core_path") . "components/msavanalyticstools/"
	) . "model/msavanalyticstools/",
	$scriptProperties
);

if ( $msavanalyticstools instanceof msavAnalyticsTools ) {
	$output = $msavanalyticstools->get_google_experiment_code($is_active, $ex_key);
}

return $output;