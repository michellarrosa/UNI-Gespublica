<?php
/**
 * @package    UNI.Sistema
 *
 * @copyright  Copyright (C) 2016 - 2017 Websailor®. All rights reserved.
 * @license    GNU General Public License version 1 or later; see LICENSE.txt
 * @Developer 	Michel Larrosa [suporte AT michel DOT eng DOT br]
 */

define('_UNIEXEC', 1);

require_once 'configs/Unfigurations.php';

date_default_timezone_set ( 'America/Sao_Paulo' );

require_once('framework/uniData.php');

require_once('framework/uniPublic.php');

define("LEVEL", "_CLIENT");

$public = new uniPublic();

if(isset($_REQUEST['function'])){
	$resp = $public->scriptMaze($_REQUEST['function'], $_REQUEST['data']);
	echo $resp;
}elseif(isset($_REQUEST['componente']) && isset($_REQUEST['modulo'])){
	$resp = $public->modMaze($_REQUEST['componente'], LEVEL, $_REQUEST['modulo']);
	echo $resp;
}

// echo "publicFunction debug <br>";
?>