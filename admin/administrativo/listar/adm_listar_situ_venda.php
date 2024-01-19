<?php
	$result_situacoes_vendas = "SELECT * FROM situacoes_vendas";
	$resultado_situacoes_vendas = mysqli_query($conn , $result_situacoes_vendas);
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista de Situação de Vendas</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=27"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
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
					<?php while($row_situacoes_vendas = mysqli_fetch_assoc($resultado_situacoes_vendas)){?>
						<tr>
							<td class="text-center"><?php echo $row_situacoes_vendas["id"]; ?></td>
							<td class="text-center"><?php echo $row_situacoes_vendas["nome"]; ?></td>
							<td class="text-center"><?php echo date('d/m/Y H:i:s',strtotime($row_situacoes_vendas["created"])); ?></td>
							<td class="text-center">
								<a href="administrativo.php?link=29&id=<?php echo $row_situacoes_vendas["id"]; ?>">
									<button type="button" class="btn btn-xs btn-primary">
										Visualizar
									</button>
								</a>
								<a href="administrativo.php?link=28&id=<?php echo $row_situacoes_vendas["id"]; ?>">
									<button type="button" class="btn btn-xs btn-warning">
										Editar
									</button>
								</a>
								<a href="administrativo/processa/adm_apagar_situ_venda.php?id=<?php echo $row_situacoes_vendas["id"]; ?>">
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