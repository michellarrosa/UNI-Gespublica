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
$data="17/07/2017";
$data = str_replace("/", "-", $data);
$dtz = new DateTimeZone("America/Sao_Paulo");
$dt = new Datetime($data, $dtz);
echo $dt->format("d/m/Y") . "<br>";

// $cpf = "008.234.100-07";
// echo (int)str_replace(array('.','-'), '', $cpf);

//TESTADOR DE QUERIES
$query="SELECT sessiondatetime FROM uni.contadeusuario WHERE sessionid='4c1e483c'";
// $query="SELECT nome FROM ". UConfig::$UDB_Prefixo ."componentes WHERE id = 2";
// $query = "SELECT m.id, m.modulo, p.posicao FROM ". UConfig::$UDB_Prefixo ."modulos as m, ". UConfig::$UDB_Prefixo ."posicoes as p WHERE m.nivel <= ". USER['nivel'] ." AND p.id = m.posicao AND m.menu = ". MENU['id'] ."";
echo "<br>----------------- QUERIES --------------------<br>";
echo "<pre>";
var_dump($app->execQuery($query)["result"][0]["sessiondatetime"]);
echo "</pre>";

// $app->execLogout();

// $v=$app->verificaLoginOnLine();
// echo "<pre>";
// var_dump($v);
// echo "</pre>";

// $login="suporte@websailor.com.br";
// $password="12345";

// $login="Michel";
// $password="12345";
// $mxl=$app->execLogin($login, $password);
// echo "<pre>";
// var_dump($mxl);
// echo "</pre>";

// echo date('Y-m-d H:i:s')
//TESTADOR DO UNVIRONMENT
echo "<br>----------------- UNVIRONMENT --------------------<br>";
echo "<pre>";
print_r( MENU );
print_r( USER );
print_r($app->Modulos());
echo "</pre>";
?>