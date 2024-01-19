<?php
	$result_alt_vendas = "SELECT * FROM alteracoes_sitacoes_vendas";
	$resultado_alt_vendas = mysqli_query($conn , $result_alt_vendas);
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista de Alterações na Vendas</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=35"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Número da Venda</th>
						<th class="text-center">Situação da Venda</th>
						<th class="text-center">Data da Alteração</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_alt_vendas = mysqli_fetch_assoc($resultado_alt_vendas)){?>
						<tr>
							<td class="text-center"><?php echo $row_alt_vendas["id"]; ?></td>
							<td class="text-center">							
								<?php echo $row_alt_vendas["venda_id"]; ?>
							</td>
							<td class="text-center">
								<?php $situacoes_venda_id = $row_alt_vendas["situacoes_venda_id"]; 
									$result_situacoes_vendas = "SELECT * FROM situacoes_vendas WHERE id = '$situacoes_venda_id' LIMIT 1";
									$resultado_situacoes_vendas = mysqli_query($conn, $result_situacoes_vendas);
									$row_situacoes_vendas = mysqli_fetch_assoc($resultado_situacoes_vendas);
									echo $row_situacoes_vendas['nome'];
								?>
							</td>
							<td class="text-center"><?php echo date('d/m/Y H:i:s',strtotime($row_alt_vendas["created"])); ?></td>
							<td class="text-center">
								<a href="administrativo.php?link=37&id=<?php echo $row_alt_vendas["id"]; ?>">
									<button type="button" class="btn btn-xs btn-primary">
										Visualizar
									</button>
								</a>
								<a href="administrativo.php?link=36&id=<?php echo $row_alt_vendas["id"]; ?>">
									<button type="button" class="btn btn-xs btn-warning">
										Editar
									</button>
								</a>
								<a href="administrativo/processa/adm_apagar_alt_venda.php?id=<?php echo $row_alt_vendas["id"]; ?>">
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