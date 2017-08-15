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

$modReturn ="
		<html>
			<div id='conteudo'>
			
				<div class='col-xs-12'>
          <div class='box box-solid box-primary'>
            <div class='box-header'>
              <h3 class='box-title'>". $tituloModulo."</h3>
            </div>
            <!-- /.box-header -->
            <div class='box-body'>
              <table id='example1' class='table table-bordered table-striped' style='text-align:left'>
                <thead>
                <tr>
				  <th>Nome</th>
                  <th>E-mail</th>
                  <th>CPF</th>
                  <th>ACL</th>
                  <th>Categoria(nível)</th>
				  <th></th>
                </tr>
                </thead>
								
                <tbody>
								
                ".$conteudoBody."
								
								</tbody>
								
                <tfoot>
                <tr>
                  <th>Nome</th>
                  <th>E-mail</th>
                  <th>CPF</th>
                  <th>ACL</th>
                  <th>Categoria(nível)</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

				</div>
				
			</div><!-- /#conteudo -->
		</html>
			";
		echo $modReturn;
?>
