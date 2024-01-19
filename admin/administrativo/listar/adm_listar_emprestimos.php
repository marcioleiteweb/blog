<?php
	$result_produtos = "SELECT * FROM emprestimos";
	$resultado_produtos = mysqli_query($conn , $result_produtos);
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista de Emprestimos</h1>
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
						<th class="text-center">Tipo</th>
						<th class="text-center">Valor</th>
						<th class="text-center">Funcionario</th>
						<th class="text-center">status</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_produtos = mysqli_fetch_assoc($resultado_produtos)){?>
						<tr>
							<td class="text-center"><?php echo $row_produtos["id"]; ?></td>
							<td class="text-center"><?php echo $row_produtos["tipo_emprestimo"]; ?></td>
							<td class="text-center"><b><?php echo "R$ ".$row_produtos["valor"]; ?></b></td>
						
							<td class="text-center">
								<?php $categorias_produto = $row_produtos["id_funcionario"]; 
									$result_categorias_produto = "SELECT * FROM funcionarios WHERE id = '$categorias_produto' LIMIT 1";
									$resultado_categorias_produto = mysqli_query($conn, $result_categorias_produto);
									$row_categorias_produto = mysqli_fetch_assoc($resultado_categorias_produto);
									echo $row_categorias_produto['nome_completo'];
								?>
							</td>
							<td class="text-center">
								<?php $situacoes_produto = $row_produtos["status_emprestimo"]; 
									$result_situacoes_produto = "SELECT * FROM status_emprestimos WHERE id = '$situacoes_produto' LIMIT 1";
									$resultado_situacoes_produto = mysqli_query($conn, $result_situacoes_produto);
									$row_situacoes_produto = mysqli_fetch_assoc($resultado_situacoes_produto);
									echo $row_situacoes_produto['status'];
								?>
							</td>
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
								
								<a href="administrativo/processa/apaga/adm_apagar_emprestimo.php?id=<?php echo $row_produtos["id"]; ?>">
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