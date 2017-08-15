<?php
/**
 * @package    UNI.Sistema
 *
 * @copyright 	Copyright (C) 2016 - 2017 Websailor®. All rights reserved.
 * @License 	GNU General Public License version 1 or later; see LICENSE.txt
 * @Developer 	Michel Larrosa [suporte AT michel DOT eng DOT br]
 */

define('_UNIEXEC', 1);
define('UNIPATH_BASE', __DIR__);
require_once UNIPATH_BASE . '/framework/defines.php';
require_once UNIPATH_BASE . '/framework/framework.php';
$app = new uni();

echo "<br>----------------- GERAL --------------------<br>";
// $cpf = "008.234.100-07";
// echo (int)str_replace(array('.','-'), '', $cpf);

echo "<br>-------------- LOGIN - LOGOUT ----------------<br>";
// $v=$app->verificaLoginOnLine();
// echo "<pre>";
// var_dump($v);
// echo "</pre>";

// $login="suporte@websailor.com.br";
// $password="12345";

// $login="michel.larrosa@riogrande.rs.gov.br";
// $password="12345";

// $login="Michel";
// $password="12345";
// $mxl=$app->execLogin($login, $password);
// echo "<pre>";
// var_dump($mxl);
// echo "</pre>";

// $app->execLogout();

echo "<br>----------------- QUERIES --------------------<br>";

// $query="SELECT * FROM ". UConfig::$UDB_Prefixo ."contadeusuario WHERE email='$login' AND password='".hash(UConfig::$UHash_algo, $password)."'";
//teste de modulos
// $query = "SELECT m.id, m.modulo, p.posicao FROM ". UConfig::$UDB_Prefixo ."modulos as m, ". UConfig::$UDB_Prefixo ."posicoes as p WHERE m.nivel = ". $_SESSION['USER']['nivel'] ." AND p.id = m.posicao AND m.menu = ". $_SESSION['MENU']['id'] ."";
// session_start();

// echo "<pre>";
// var_dump($app->Modulos());
// echo "</pre>";

echo "<br>----------------- UNVIRONMENT --------------------<br>"; /*somente se logado no UNI*/
// echo "<pre>";
// print_r( $_SESSION['MENU'] );
// print_r( $_SESSION['USER'] );
// print_r($app->Modulos());
// echo "</pre>";
