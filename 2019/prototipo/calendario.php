<?php

//include_once("conexao.php");
//$result_events = "SELECT id, title, color, start, end FROM events";
//$resultado_events = mysqli_query($conn, $result_events);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset='utf-8' />
		<title>Agenda</title>
		<!--<link href='css/bootstrap.min.css' rel='stylesheet'>
		<link href='css/fullcalendar.min.css' rel='stylesheet' />
		<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
		<link href='css/personalizado.css' rel='stylesheet' />-->
		
	</head>
	<body id="calendario">
		<div class="container">
			<!--<div class="page-header">
				<h1>Agenda</h1>
			</div>-->
			<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			?>
		
			<div id='calendar'></div>
		</div>

		<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title text-left">Dados do agendamento</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

					</div>
					<div class="modal-body">
						<div class="visualizar">
							<!--<div class="row">
								<label><strong>Código do agendamento:</strong></label> 
								<input class="form-control-plaintext" id="id" type="text" style="width: 30%;" value="" disabled>
							</div>-->

							<div class="row">
								<label><strong>Nome do cliente:</strong></label> 
								<input class="form-control-plaintext" id="title" type="text" style="width: 30%;" value="" disabled>
							</div>

							<div class="row">
								<label><strong>Inicio do agendamento:</strong></label> 
								<input class="form-control-plaintext" id="start" type="text" style="width: 30%;" value="" disabled>
							</div>

							<div class="row">
								<label><strong>Fim do agendamento:</strong></label> 
								<input class="form-control-plaintext" id="end" type="text" style="width: 30%;" value="" disabled>
							</div>
							
							<!--<dl class="dl-horizontal">
								<dt>Código do agendamento:</dt>
								<dd id="id"></dd>
								<dt>Titulo do Evento</dt>
								<dd id="title"></dd>
								<dt>Inicio do Evento</dt>
								<dd id="start"></dd>
								<dt>Fim do Evento</dt>
								<dd id="end"></dd>
							</dl>-->
							<div align="right" style="margin-top: 2%;">
								<button id="btnEditarModal" class="btn btn-canc-vis btn-warning">Editar</button>
								<button class="btn excluir btn-success">Excluir</button>
							</div>
							
						</div>

						<!--<div class="form">
							<form class="form-horizontal" method="POST" action="proc_edit_evento.php">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="title" id="title" placeholder="Titulo do Evento">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Cor</label>
									<div class="col-sm-10">
										<select name="color" class="form-control" id="color">
											<option value="">Selecione</option>			
											<option style="color:#FFD700;" value="#FFD700">Amarelo</option>
											<option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
											<option style="color:#FF4500;" value="#FF4500">Laranja</option>
											<option style="color:#8B4513;" value="#8B4513">Marrom</option>	
											<option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
											<option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
											<option style="color:#A020F0;" value="#A020F0">Roxo</option>
											<option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>										
											<option style="color:#228B22;" value="#228B22">Verde</option>
											<option style="color:#8B0000;" value="#8B0000">Vermelho</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Data Inicial</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Data Final</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="end" id="end" onKeyPress="DataHora(event, this)">
									</div>
								</div>
								<input type="hidden" class="form-control" name="id" id="id">
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="button" class="btn btn-canc-edit btn-primary">Cancelar</button>
										<button type="submit" class="btn btn-warning">Salvar Alterações</button>
									</div>
								</div>
							</form>
						</div>-->

						<!--<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
							    <div class="modal-content">
							        <div class="modal-header atencao">
							            Atenção
							        </div>
							        <div class="modal-body">
							            Confirma exclusão deste atendimento?
							        </div>
							        <div class="modal-footer">
							            <button type="button" class="btn btn-primary" data-dismiss="modal" href="#">Cancelar</button>
							            <button class="btn btn-success excluir" id="botaoExcluirCalendario" onclick="excluirDadoCalendario()">Excluir</button>
							        </div>
							    </div>
							</div>	
						</div>-->
					</div>
				</div>
			</div>
		</div>
		
		<!--<div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title text-center">Cadastrar Evento</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" method="POST" action="proc_cad_evento.php">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="title" placeholder="Titulo do Evento">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Cor</label>
								<div class="col-sm-10">
									<select name="color" class="form-control" id="color">
										<option value="">Selecione</option>			
										<option style="color:#FFD700;" value="#FFD700">Amarelo</option>
										<option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
										<option style="color:#FF4500;" value="#FF4500">Laranja</option>
										<option style="color:#8B4513;" value="#8B4513">Marrom</option>	
										<option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
										<option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
										<option style="color:#A020F0;" value="#A020F0">Roxo</option>
										<option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>										
										<option style="color:#228B22;" value="#228B22">Verde</option>
										<option style="color:#8B0000;" value="#8B0000">Vermelho</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Data Inicial</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Data Final</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="end" id="end" onKeyPress="DataHora(event, this)">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-success">Cadastrar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>-->
	</body>

	<!--<script src='js/jquery.min.js'></script>
	<script src='js/bootstrap.min.js'></script>
	<script src='js/moment.min.js'></script>
	<script src='js/fullcalendar.min.js'></script>
	<script src='locale/pt-br.js'></script>
	<script src='js/calendario.js'></script>-->
	
</html>
