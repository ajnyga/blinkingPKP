<?php

/**
 * @file plugins/generic/blinkingPKP/BlinkingPKPPlugin.inc.php
 *
 * Copyright (c) 2014-2019 Simon Fraser University
 * Copyright (c) 2003-2019 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class BlinkingPKPPlugin
 * @ingroup plugins_generic_blinkingPKP
 *
 * @brief Enhance your OJS site.
 */

import('lib.pkp.classes.plugins.GenericPlugin');

class BlinkingPKPPlugin extends GenericPlugin {
	/**
	 * @copydoc Plugin::register()
	 */
	function register($category, $path, $mainContextId = null) {
		if (parent::register($category, $path, $mainContextId)) {
			if ($this->getEnabled($mainContextId)) {
				HookRegistry::register('TemplateManager::display',array($this, 'enhanceSite'));

			}
			return true;
		}
		return false;
	}

	/**
	 * Enhance your OJS site
	 * @param $hookName string
	 * @param $args array
	 * @return boolean
	 */
	function enhanceSite($hookName, $args) {
		$request = Application::getRequest();
		if (!is_a($request->getRouter(), 'PKPPageRouter')) return false;
		$templateManager =& $args[0];

		$templateManager->addHeader('customFont', '<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">', array('contexts' => array('frontend', 'backend')));
		$templateManager->addStyleSheet(
			'enhanceSite',
			$request->getBaseUrl() . '/' . $this->getPluginPath() . '/css/magic.css',
			array(
				'priority' => STYLE_SEQUENCE_LATE,
				'contexts' => array('frontend', 'backend'),
			)
		);
		return false;
	}

	/**
	 * Get the display name of this plugin
	 * @return string
	 */
	function getDisplayName() {
		return __('plugins.generic.blinkingPKP.name');
	}

	/**
	 * Get the description of this plugin
	 * @return string
	 */
	function getDescription() {
		return __('plugins.generic.blinkingPKP.description');
	}
}


