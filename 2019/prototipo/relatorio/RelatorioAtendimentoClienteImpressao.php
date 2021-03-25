<?php

	require_once("./mpdf/mpdf.php");
	//require_once '../class/CategoriaDAO.php';
	//require_once '../class/ProdutoDAO.php';

	$mpdf = new mPDF();
	$mpdf->SetDisplayMode("fullpage");


	//$categoriaDAO = new CategoriaDAO();
	//$listaCategoria = $categoriaDAO->listar();	

	//$produtoDAO = new ProdutoDAO();
	//$listaProduto = $produtoDAO->listar();	
		
	
	$html = "<div id='area01'>
				<img class='figura' src='imagens/logo.png'> <span> </span>
			</div>	
			<div id='area02'>	
				<h1 class='nomeEmpresa'> RECANTO <br/> BELEZA</h1>
			</div>
			<div id='area03'>	
				<h1 class='titulo'>Atendimentos por Cliente</h1>
			</div>	
			
			";

	$html = $html . "<div id='area04'> <hr>";

	//foreach($listaCategoria as $categoria){

		$html = $html ."
					<label class='negrito'>Usuário:</label>
					<label>Maria</label>
					<label> ----- </label>
					<label class='negrito'>Cliente:</label>
					<label>Ana</label>
					<label> ----- </label>
					<label class='negrito'>Data Inicial:</label>
					<label>01-05-2019</label>
					<label> ----- </label>
					<label class='negrito'>Data Final:</label>
					<label>15-05-2019</label>

					<hr>
					<table class='tabela'>
						<thead>
							<tr>
								<th width='30%'>Data:</th>
								<th width='70%'>Serviço</th>								
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>02/05/2019</td>
								<td>Corte de Cabelo</td>
							</tr>

							<tr>
								<td>09/05/2019</td>
								<td>Escova</td>
							</tr>

							<tr>
								<td>09/05/2019</td>
								<td>Manicure e Pedicure</td>
							</tr>";
		
		/*$somaCategoria = 0;

		foreach($listaProduto as $produto){
			if($categoria->getIdCategoria() == $produto->getCategoria()->getIdCategoria()){
				$html = $html . "<tr>";								
				$html = $html .	"<td>{$produto->getNome()}</td>";
				$html = $html . "<td class='centralizar'>{$produto->getQuantidade()}</td>";				
				$html = $html .	"<td>R$ ".number_format($produto->getValor(), 2, ',', '.')."</td>";
				$subTotal = $produto->getQuantidade() * $produto->getValor();
				$html = $html .	"<td>R$ ".number_format($subTotal, 2, ',', '.')."</td>";
				$html = $html . "</tr>";	

				$somaCategoria = $somaCategoria +  $subTotal;
			}
		}*/	
						
		$html = $html . "</tbody>";

		/*$html = $html . "<tfoot>
							<tr>
								<td></td>
								<td></td>
								<td class='direita negrito'>Total</td>
								<td class='negrito'>R$ ".number_format($somaCategoria, 2, ',', '.')."</td>
							</tr>
						</tfoot>";*/

		$html = $html . "</table> </div> <hr>";


	
	//}

	$dataEmissao = date("d/m/Y H:i:s");
	
	$css = file_get_contents('css/RelatorioAtendimentoClienteImpressao.css');
	
	$mpdf->WriteHTML($css, 1);		
	$mpdf->SetHeader("Projeto Pic-Jr |  | Emissão: {$dataEmissao}");
	$mpdf->setFooter("{PAGENO} de {nb}"); 
	$mpdf->WriteHTML($html, 2);
	
	$mpdf->Output('RelatorioAtendimentoClienteImpressao.pdf',I);

	exit();
	
?>
