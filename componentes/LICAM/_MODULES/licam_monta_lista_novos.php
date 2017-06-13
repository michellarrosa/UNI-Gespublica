<?php
header('Content-Type: text/html; charset=UTF-8');
ini_set('default_charset','UTF-8');

// TRATAMENTO DAS VARIÁVEIS

$tituloModulo = "Processos Aguardando Despacho";
$conteudoBody = "";
$rodape = "rodape estilo com variável";

$listadeprocessos = $this->execQuery("SELECT * FROM com_licam.empreendimentodata")[result];

foreach($listadeprocessos as $key=>$value){
	$conteudoBody.="<tr>
								<td><a href='./?menu=6&p=".$value['id']."'>SIGMA-".sprintf("%03d",$value['id'])."-2017</a></td>
								<td>".$value['emp_razaosocial']."</td>
								<td>".$value['empreendedor_nome']."</td>
								<td>".$value['tipolicenca']."</td>
							</tr>";
} 
// FIM TRATAMENTO DAS VARIÁVEIS

$modReturn ="
	<html>
		<div id='conteudo'>
			<div class='col-xs-12'>
				<div class='box'>
					<div class='box-header'>
					  <h3 class='box-title'>".$tituloModulo."</h3>
					</div>
					<!-- /.box-header -->
				<div class='box-body'>
             <table id='example1' class='table table-bordered table-striped'>
                <thead>
                <tr>
                  <th>Protocolo</th>
                  <th>Razão social</th>
                  <th>Empreendedor</th>
                  <th>Licença Solicitada</th>
                </tr>
                </thead>
								
                <tbody>
								
                ".$conteudoBody."
								
								</tbody>
								
                <tfoot>
                <tr>
                 <th>Protocolo</th>
                  <th>Razão social</th>
                  <th>Empreendedor</th>
                  <th>Licença Solicitada</th>
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
echo utf8_decode($modReturn);
?>
