<?php
/**
 * @package    UNI.Sistema
 *
 * @copyright  Copyright (C) 2016 - 2017 Websailor®. All rights reserved.
 * @license    GNU General Public License version 1 or later; see LICENSE.txt
 * @Developer 	Michel Larrosa [suporte AT michel DOT eng DOT br]
 */

defined('_UNIEXEC') or die;

$UNV = new uni();

if($UNV->verificaLoginOnLine()){

	define('MENU',(isset($_REQUEST['menu']) ? $UNV->execQuery("SELECT * FROM ". UConfig::$UDB_Prefixo ."menus WHERE id =". $_REQUEST['menu'] . " ")['result'][0] :	array('id'=>0, 'nome'=>'UNI-GP', 'titulo'=>'UNI-GP', 'descricao'=>'UNI-GP', 'template'=>1, 'icone'=>'UNI-GP', 'componente'=>1, 'nivel'=>1)	));
	
	/****************/

	define('USER',$UNV->execQuery("SELECT c.id, c.nome, c.acl ,c.nivel, c.profissao, c.cargo FROM ". UConfig::$UDB_Prefixo ."contadeusuario as c WHERE sessionid ='". $_COOKIE['unidan'] . "' ")['result'][0]);

	/****************/
	
	define('COMPONENTE',$UNV->execQuery("SELECT nome FROM ". UConfig::$UDB_Prefixo ."componentes WHERE id =". MENU['componente']."")['result'][0]['nome']);
	
	define('TEMPLATE',"administrador/templates/".( MENU['id'] ? $UNV->execQuery("SELECT template FROM ". UConfig::$UDB_Prefixo ."templates WHERE id='". MENU['template'] ."'")['result'][0]['template'] : UConfig::$UTemplate ) ."/index.php"); //rever-refazer
	
}

