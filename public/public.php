<?php
/**
 * @package    UNI.Sistema
 *
 * @copyright  Copyright (C) 2016 - 2017 Websailor®. All rights reserved.
 * @license    GNU General Public License version 1 or later; see LICENSE.txt
 * @Developer 	Michel Larrosa [suporte AT michel DOT eng DOT br]
 */

define('_UNIEXEC', 1);

require_once '../configs/Unfigurations.php';

date_default_timezone_set ( 'America/Sao_Paulo' );

require_once('../framework/uniData.php');

require_once('../framework/uniPublic.php');

define("LEVEL", "_CLIENT");

// require_once('/home/websailor/public_html/sistemas/UNI/framework/uniPublic.php');

$public = new uniPublic();

if(isset($_REQUEST['function'])){
	
}

if(isset($_REQUEST['componente']) && isset($_REQUEST['modulo'])){
	$resp = $public->modMaze("../componentes/", $_REQUEST['componente'], LEVEL, $_REQUEST['modulo']);
	echo $resp;
}

// echo "publicFunction debug <br>";
?>