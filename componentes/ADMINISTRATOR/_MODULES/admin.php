<?php
//não usar codificação utf-8(sem bom) no arquivo
//usar utf-8 normal ou em ultimo caso iso-8859-1

header('Content-Type: text/html; charset=UTF-8');
ini_set('default_charset','UTF-8');

// TRATAMENTO DAS VARIÁVEIS
//#nicializando as principais
$conteudoHeader = "";
$conteudoBody = "";
$rodape = "";

$login = $this->verificaLoginOnLine();
$menun = MENU['nome'];
$sessionid = $_COOKIE['unidan'];
$query="SELECT nome FROM ". UConfig::$UDB_Prefixo ."acl WHERE id = (SELECT acl from ". UConfig::$UDB_Prefixo ."contadeusuario WHERE sessionid ='$sessionid')";
$acl = $this->execQuery($query)['result'][0]['nome'];
$list ="<ul>
			<li>menu: $menun</li>
			<li>session: $sessionid</li>
			<li>acl: $acl</li>
		</ul>";


//#principais
$conteudoHeader = "header";
$conteudoBody = "vamos ver: $login<hr>$list<br>";
$rodape = "rodape";

// FIM TRATAMENTO DAS VARIÁVEIS

$modReturn ="
		<html>
		
			<div id='conteudo'>
				<section class='col-lg-6 col-md-6 connectedSortable ui-sortable' id='mod'>
					<div class='box box-success' id='box'>
						<div id='box-header' class='box-header with-border'>
						<h3 id='box-title' class='box-title'>" . 
						
						$conteudoHeader
						
						. "</h3>
						<div id='box-tools' class='box-tools pull-right'>
							<span id='label' class='label label-primary'></span>
						</div>
						
						</div>
						<div id='box-body' class='box-body'>".
						
						$conteudoBody
						
						."</div>
						<div id='box-footer' class='box-footer'>".
						
						$rodape
						
						."</div>
					</div>
				</section>
			</div>		
		
		</html>
			";
		echo $modReturn;
?>