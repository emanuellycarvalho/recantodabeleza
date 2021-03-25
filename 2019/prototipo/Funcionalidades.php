<?php 
	session_start();
	if ($_SESSION["teste"]!="true") {
		echo "<script> alert('Acesso negado!'); location.href='Login.php';</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Relatório de atendimento de cliente - Recanto Beleza</title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="css/icon.css"/>
	<link rel="stylesheet" href="css/Estilo.css"/>
	<link rel="stylesheet" href="css/Funcionalidades.css"/>


</head>
<body>
	<header>
		<?php 
		include_once("CabecalhoHome.php");  	
		?>
	</header>

	<div class="container" id="borda">
		<h3><img src="imagens/funcionalidade.png" title="Funcionalidades" alt="Funcionalidades"> Funcionalidades do Recanto Beleza versão Web</h3>
		<label><strong>Tela 1: Home Principal</strong></label>
		<ul>
			<li>O <i>Minha Conta</i> leva para a tela de Login.</li>
			<li>Não permite o acesso às outras páginas sem o usuário ter logado.</li>
		</ul>

		<label><strong>Tela 2: Login</strong></label>
		<ul>
			<li>Pode-se logar com dois tipos de usuários:</li>
			<ul>
				<li>Cliente: pessoa comum que deseja comprar um produto ou pagar por um serviço do salão.</li>
				<ul>
					<li>E-mail: cliente@cliente;</li>
					<li>Senha: 123456;</li>
					<li>Após logar, o sistema levará para a <i>Home do Cliente</i> (tela 3).</li>
				</ul>
				<li>Secretária: exerce o papel de administradora do Salão de Beleza.</li>
				<ul>
					<li>E-mail: secretaria@secretaria;</li>
					<li>Senha: 123456;</li>
					<li>Após logar, o sistema levará para a <i>Home da Secretária</i> (tela 4).</li>
				</ul>
			</ul>
		</ul>

		<label><strong>Tela 3: Home do Cliente</strong></label>
		<ul>
			<li>Essa tela está apenas desenhada. Só há links no botão de <i>Sair</i>, que vai encerrar a sessão (logout) do cliente e redirecionar para a página de <i>Login</i> (tela 2), e no ícone e no título do Recanto Beleza, redirecionando para a <i>Home Principal</i> (tela 1).</li>
		</ul>

		<label><strong>Tela 4: Home da Secretária</strong></label>
		<ul>
			<li>Nessa tela, por sua vez, contém várias funcionalidades:</li>
			<ul>
				<li>Link no botão de <i>Sair</i>, que vai encerrar a sessão (logout) da secretária e redirecionar para a página de <i>Login</i> (tela 2).</li>
				<li>Link no ícone e no título do Recanto Beleza, redirecionando para a <i>Home Principal</i> (tela 1).</li>
				<li>Links no menu lateral:</li>
				<ul>
					<li><strong>Gerenciar:</strong> Clientes (tela 5), Produtos, Serviços, Profissionais e Cidades possuem o CRUD; Fornecedores não.</li>
					<li><strong>Atendimentos:</strong> Agendar (tela 6) e Registrar (tela 7).</li>
					<li><strong>Compras:</strong> Não há funcionalidades prontas.</li>
					<li><strong>Pagamentos:</strong> Registrar (tela 8). Despesas e Financeiro não estão prontos.</li>
					<li><strong>Relatórios:</strong> Agendamentos e Pagamentos em Atraso não estão prontos. Atendimentos por Cliente está (tela 9).</li>
					<li><strong>Ajuda:</strong> Documentação, Suporte e Sobre não estão prontos. Funcionalidades é esta tela :)</li>
				</ul>
				<li>Links no <i>Calendário</i>: se clicar em cima de um agendamento, abrirá o modal de visualização. Os botões de Excluir e Editar não funcionam. Se clicar em um dia que não possui nada agendado, o sistema redirecionará para a tela de <i>Agendar Atendimentos</i> (tela 6).</li>
			</ul>
		</ul>

		<label><strong>Tela 5: Clientes</strong></label>
		<ul>
			<li>O <i>CRUD</i> está completo. Consultar o Guia de Estilos para mais informações.</li>
			<li>O <i>Minha Conta</i> leva para a <i>Home da Secretária</i>.</li>
		</ul>

		<label><strong>Tela 6: Agendar Atendimento</strong></label>
		<ul>
			<li>A tela está completa. Consultar o Guia de Estilos para mais informações.</li>
			<li>O botão de “+” redireciona para o <i>Cadastrar Cliente</i> e, se cadastrado com sucesso, o cliente aparece na caixa de seleção ao lado, na última posição.</li>
			<li>O botão de “Adicionar Serviço” ( com o ícone de uma tabela com um +) adiciona uma nova linha de serviços à um cliente. Quando acionado, cria-se duas novas caixas de seleção para serviço e profissional, respectivamente, e o botão da linha anterior vira o de “Remover Serviço” ( com o ícone de uma tabela com um -).</li>
			<li>O <i>Minha Conta</i> leva para a <i>Home da Secretária.</i></li>
		</ul>

		<label><strong>Tela 7: Registrar Atendimento</strong></label>
		<ul>
			<li>A tela está completa. Consultar o Guia de Estilos para mais informações.</li>
			<li>O botão de “+” redireciona para o <i>Cadastrar Cliente</i> e, se cadastrado com sucesso, o cliente aparece na caixa de seleção ao lado, na última posição.</li>
			<li>A caixa de seleção de “Profissional” muda de acordo com a caixa de seleção de “Serviço”: para os três primeiros serviços aparecem três nomes de profissionais; para os três últimos serviços, aparecem outros três profissionais.</li>
			<li>O botão de “Adicionar na Tabela” ( com o ícone de uma tabela com um +) adiciona uma nova linha à tabela de “Serviços”. O botão de “Remover da Tabela” ( com o ícone de uma tabela com um -) remove uma linha da tabela de “Serviços”.</li>
			<li>O <i>Minha Conta</i> leva para a <i>Home da Secretária.</i></li>
		</ul>

		<label><strong>Tela 8: Registrar Pagamento</strong></label>
		<ul>
			<li>A tela está incompleta. Consultar o Guia de Estilos para mais informações.</li>
			<li>O <i>Minha Conta</i> leva para a <i>Home da Secretária.</i></li>
		</ul>

		<label><strong>Tela 9: Relatório “Atendimentos por Cliente”</strong></label>
		<ul>
			<li>A tela está completa. Consultar o Guia de Estilos para mais informações.</li>
			<li>Se selecionado um dos 5 primeiros clientes da caixa de seleção e preenchido de forma correta os demais campos, aparecerá um resultado na tabela. Se selecionado o último cliente (Mateus), aparecerá outro resultado (nesse caso, não é necessário preencher as datas).</li>
			<li>Os campos de data são de preenchimento obrigatórios.</li>
			<li>A “Data  Inicial”, para que haja resultados na tabela, deve ser preenchida com o dia 02/05/2019 ou anterior.</li>
			<li>O botão de “Imprimir” redireciona para um documento PDF padrão.</li>
			<li>O <i>Minha Conta</i> leva para a <i>Home da Secretária.</i></li>
		</ul>

	</div>	

	<div class="row form-group">
		<div class="col-md-12" align="right">
			<a href="HomeFuncionario.php" class="btn btn-primary" type="button" name="cancelar" id="cancelar">Cancelar</a>		
		</div>											
	</div>

	<footer>
		<?php
			include_once("Rodape.php");
		?>
	</footer>
	
</body>

<script src="jQuery/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</html>