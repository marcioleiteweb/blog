<?php
	$result_produtos = "SELECT * FROM produtos";
	$resultado_produtos = mysqli_query($conn , $result_produtos);
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista de Produtos</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=58"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Nome</th>
						<th class="text-center">Preço</th>
						<th class="text-center">Categoria</th>
						<th class="text-center">Situação</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_produtos = mysqli_fetch_assoc($resultado_produtos)){?>
						<tr>
							<td class="text-center"><?php echo $row_produtos["id"]; ?></td>
							<td class="text-center"><?php echo $row_produtos["nome"]; ?></td>
							<td class="text-center"><b><?php echo "R$ ".$row_produtos["preco"]; ?></b></td>
						
							<td class="text-center">
								<?php $categorias_produto = $row_produtos["categorias_produto_id"]; 
									$result_categorias_produto = "SELECT * FROM categorias_produtos WHERE id = '$categorias_produto' LIMIT 1";
									$resultado_categorias_produto = mysqli_query($conn, $result_categorias_produto);
									$row_categorias_produto = mysqli_fetch_assoc($resultado_categorias_produto);
									echo $row_categorias_produto['nome'];
								?>
							</td>
							<td class="text-center">
								<?php $situacoes_produto = $row_produtos["situacoes_produto_id"]; 
									$result_situacoes_produto = "SELECT * FROM situacoes_produtos WHERE id = '$situacoes_produto' LIMIT 1";
									$resultado_situacoes_produto = mysqli_query($conn, $result_situacoes_produto);
									$row_situacoes_produto = mysqli_fetch_assoc($resultado_situacoes_produto);
									echo $row_situacoes_produto['nome'];
								?>
							</td>
							<td class="text-center"><?php echo date('d/m/Y H:i:s',strtotime($row_produtos["created"])); ?></td>
							<td class="text-center">
								<a href="administrativo.php?link=57&id=<?php echo $row_produtos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-primary">
										Visualizar
									</button>
								</a>
								
								<a href="administrativo.php?link=59&id=<?php echo $row_produtos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-warning">
										Editar
									</button>
								</a>
								
								<a href="administrativo/processa/apaga/adm_apagar_produtos.php?id=<?php echo $row_produtos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-danger">
										Apagar
									</button>
								</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
        </div>
	</div>
</div>