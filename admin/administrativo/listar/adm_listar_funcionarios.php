<?php
	$result_categorias_produtos = "SELECT * FROM  funcionarios";
	$resultado_categorias_produtos = mysqli_query($conn , $result_categorias_produtos);
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista de funcionarios</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=54"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Nome Completo</th>
						<th class="text-center">Cargo</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_categorias_produtos = mysqli_fetch_assoc($resultado_categorias_produtos)){?>
						<tr>
							<td class="text-center"><?php echo $row_categorias_produtos["id"]; ?></td>
							<td class="text-center"><?php echo $row_categorias_produtos["nome_completo"]; ?></td>
							<td class="text-center"><?php echo $row_categorias_produtos["cargo"]; ?></td>
							
							<td class="text-center">
								<a href="administrativo.php?link=53&id=<?php echo $row_categorias_produtos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-primary">
										Visualizar
									</button>
								</a>
								<a href="administrativo.php?link=55&id=<?php echo $row_categorias_produtos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-warning">
										Editar
									</button>
								</a>
								<a href="administrativo/processa/apaga/adm_apagar_funcionario.php?id=<?php echo $row_categorias_produtos["id"]; ?>">
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