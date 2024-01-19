<?php
	$result_situacoes_produtos = "SELECT * FROM situacoes_produtos";
	$resultado_situacoes_produtos = mysqli_query($conn , $result_situacoes_produtos);
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista de Situação do Produto</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=23"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Nome</th>
						<th class="text-center">Inserido</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_situacoes_produtos = mysqli_fetch_assoc($resultado_situacoes_produtos)){?>
						<tr>
							<td class="text-center"><?php echo $row_situacoes_produtos["id"]; ?></td>
							<td class="text-center"><?php echo $row_situacoes_produtos["nome"]; ?></td>
							<td class="text-center"><?php echo date('d/m/Y H:i:s',strtotime($row_situacoes_produtos["created"])); ?></td>
							<td class="text-center">
								<a href="administrativo.php?link=25&id=<?php echo $row_situacoes_produtos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-primary">
										Visualizar
									</button>
								</a>
								<a href="administrativo.php?link=24&id=<?php echo $row_situacoes_produtos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-warning">
										Editar
									</button>
								</a>
								<a href="administrativo/processa/adm_apagar_situ_produto.php?id=<?php echo $row_situacoes_produtos["id"]; ?>">
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