<?php
header('Content-Type: text/html; charset=UTF-8');
ini_set('default_charset','UTF-8');

// TRATAMENTO DAS VARIÁVEIS

$tituloModulo = "Usuários Cadastrados no Sistema UNI-Gespublica";
$conteudoBody = "";
$rodape = "rodape estilo com variável";

$contasdeusuario = $this->execQuery("SELECT * FROM ". UConfig::$UDB_Prefixo ."contadeusuario")[result];

foreach($contasdeusuario as $key=>$value){
	$conteudoBody.="<tr> 
						<td>".$value['nome']."</td>
						<td>".$value['email']."</td>
						<td>".$value['cpf']."</td>
						<td>".$value['acl']."</td>
						<td>".$value['nivel']."</td>
						<td>Apagar </td>
					</tr>";
} 
// FIM TRATAMENTO DAS VARIÁVEIS
// FIM TRATAMENTO DAS VARIÁVEIS

$modReturn ="
	<html>
		<div id='conteudo'>
			<section class='col-sm-12 col-lg-12 col-md-12 col-xs-12 table-responsive connectedSortable ui-sortable' id='mod'>
				". $warning ."
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
				<div class="box box-default collapsed-box">
					<div class="box-header with-border">
						<h3 class="box-title">Expandable</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
						</div><!-- /.box-tools -->
					</div><!-- /.box-header -->
					<div class="box-body">
						<input><input>
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</section>
		</div><!-- /#conteudo -->
	</html>
			";
echo utf8_decode($modReturn);
?>
