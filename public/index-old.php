<?php
/**
 * @package    UNI.Sistema
 *
 * @copyright  Copyright (C) 2016 - 2017 UNI and FURG(Universidade). All rights reserved.
 * @license    GNU General Public License version 1 or later; see LICENSE.txt
 * @DevTeam-Mention [ Michel Larrosa ] [ Bruna Santos ]
 */

/**
 * Define the application's minimum supported PHP version as a constant so it can be referenced within the application.
 */
define('UNI_MINIMUM_PHP', '5.3.10');

if (version_compare(PHP_VERSION, UNI_MINIMUM_PHP, '<'))
{
	die('Seu servido precisa ter instalado PHP ' . UNI_MINIMUM_PHP . ' ou posterior para executar essa versão do UNI!');
}
define('_UNIEXEC', 1);
define('UNIPATH_BASE', __DIR__);
require_once PATH_BASE . '/includes/defines.php';

require_once UNIPATH_BASE . '/includes/framework.php';

// Mark afterLoad in the profiler.
UNIDEBUG ? $_PROFILER->mark('afterLoad') : null;

// Instantiate the application.
$app = UFactory::getApplication('ext');

// Execute the application.
$app->execute();

?>