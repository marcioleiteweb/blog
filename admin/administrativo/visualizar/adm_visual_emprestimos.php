<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_categorias_produtos = "SELECT * FROM emprestimos WHERE id = '$id' LIMIT 1";
	$resultado_categorias_produtos = mysqli_query($conn, $result_categorias_produtos);
	$row_categorias_produtos = mysqli_fetch_assoc($resultado_categorias_produtos);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Funcionário</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=56">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			
			<a href="administrativo.php?link=59&id=<?php echo $row_categorias_produtos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			
			<a href="administrativo/processa/apaga/adm_apagar_emprestimo.php?id=<?php echo $row_categorias_produtos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">
		<dt>Id: </dt>
		<dd><?php echo $row_categorias_produtos['id']; ?></dd>
		<dt>Emprestimo: </dt>
		<dd><?php echo $row_categorias_produtos['tipo_emprestimo']; ?></dd>
		<dt>Data: </dt>
		<dd><?php echo date('d/m/Y',strtotime($row_categorias_produtos["data_emprestimo"])); ?></dd>
		<dt>Parcelas: </dt>
		<dd><?php echo $row_categorias_produtos['numero_parcelamento']; ?></dd>
		<dt>Valor: </dt>
		<dd>R$ <?php echo $row_categorias_produtos['valor']; ?></dd>
		<dt>Funcionario: </dt>
		<dd>
		<?php $categorias_produto = $row_categorias_produtos["id_funcionario"]; 
			$result_categorias_produto = "SELECT * FROM funcionarios WHERE id = '$categorias_produto' LIMIT 1";
			$resultado_categorias_produto = mysqli_query($conn, $result_categorias_produto);
			$row_categorias_produto = mysqli_fetch_assoc($resultado_categorias_produto);
			echo $row_categorias_produto['nome_completo'];
		?>
		</dd>
		<dt>Status: </dt>
		<dd>
		<?php $situacoes_produto = $row_categorias_produtos["status_emprestimo"]; 
			$result_situacoes_produto = "SELECT * FROM status_emprestimos WHERE id = '$situacoes_produto' LIMIT 1";
			$resultado_situacoes_produto = mysqli_query($conn, $result_situacoes_produto);
			$row_situacoes_produto = mysqli_fetch_assoc($resultado_situacoes_produto);
			echo $row_situacoes_produto['status'];
		?>
		</dd>
	</dl>
</div>