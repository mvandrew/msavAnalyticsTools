<?php

class msavAnalyticsTools {

	/**
	 * Extension system name
	 *
	 * @var string
	 */
	public static $EXT_NAME = "msavanalyticstools";

	/**
	 * @var modX
	 */
	public $modx = null;
	public $config = array();

	/**
	 * msavAnalyticsTools constructor.
	 *
	 * @param modX $modx
	 * @param array $config
	 */
	function __construct(modX &$modx, array $config = array()) {

		$this->modx = & $modx;

		// Base Path
		$basePath = $this->modx->getOption(
			self::$EXT_NAME . ".core_path",
			$config,
			$this->modx->getOption("core_path") . "components/" . self::$EXT_NAME
		);

		// Assets URL
		$assetsUrl = $this->modx->getOption(
			self::$EXT_NAME . ".assets_url",
			$config,
			$this->modx->getOption("assets_url") . "components/" . self::$EXT_NAME
		);

		// Filling Configuration Parameters
		$this->config = array_merge(
			array(
				"basePath"          => $basePath,
				"corePath"          => $basePath,
				"modelPath"         => $basePath . "model/",
				"processorsPath"    => $basePath . "processors/",
				"templatesPath"     => $basePath . "templatesPath/",
				"chunksPath"        => $basePath . "elements/chunks/",
				"jsUrl"             => $assetsUrl . "javascripts/",
				"cssUrl"            => $assetsUrl . "css/",
				"assetsUrl"         => $assetsUrl,
				"connectorUrl"      => $assetsUrl . "connector.php",
			),
			$config
		);

	} // __construct

}