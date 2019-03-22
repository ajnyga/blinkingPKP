<?php

/**
 * @defgroup plugins_generic_blinkingPKP blinkingPKP plugin
 */

/**
 * @file plugins/generic/blinkingPKP/index.php
 *
 * Copyright (c) 2014-2019 Simon Fraser University
 * Copyright (c) 2003-2019 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @ingroup plugins_generic_blinkingPKP
 * @brief Wrapper for Blinking PKP plugin.
 *
 */

require_once('BlinkingPKPPlugin.inc.php');

return new BlinkingPKPPlugin();
