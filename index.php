<?php
/**
 * @package    UNI.Sistema
 *
 * @copyright  Copyright (C) 2016 - 2017 Websailor®. All rights reserved.
 * @license    GNU General Public License version 1 or later; see LICENSE.txt
 * @Developer 	Michel Larrosa [suporte AT michel DOT eng DOT br]
 */

/**
 * Define a versão minima do PHP suportada pelo programa como uma constante para ser referenciada durante a execucao.
 * Define the application's minimum supported PHP version as a constant so it can be referenced within the application.
 */

define('UNI_MINIMUM_PHP', '5.6.10');

if (version_compare(PHP_VERSION, UNI_MINIMUM_PHP, '<')){
	die('<center>Seu servidor precisa ter PHP ' . UNI_MINIMUM_PHP . ' ou superior para executar esta versão do UNI!<br>Your host needs to use PHP ' . UNI_MINIMUM_PHP . ' or higher to run this version of UNI!</center>');
}

define('_UNIEXEC', 1);

define('UNIPATH_BASE', __DIR__);

require_once UNIPATH_BASE . '/framework/defines.php';

require_once UNIPATH_BASE . '/framework/framework.php';

// Instanciar a aplicacao.	// Instantiate the application.
$app = new uni();

// Executa a aplicacao.			// Execute the application.
if($app->manager(UNIPATH_ADM)){
	$app->execute();
}
?>