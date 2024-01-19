<?php
	$result_vendas = "SELECT * FROM vendas";
	$resultado_vendas = mysqli_query($conn , $result_vendas);
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista de Vendas</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=31"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Produto</th>
						<th class="text-center">Situação da Venda</th>
						<th class="text-center">Data da Compra</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_vendas = mysqli_fetch_assoc($resultado_vendas)){?>
						<tr>
							<td class="text-center"><?php echo $row_vendas["id"]; ?></td>
							<td class="text-center">							
								<?php $produto_id = $row_vendas["produto_id"]; 
									$result_produtos = "SELECT * FROM produtos WHERE id = '$produto_id' LIMIT 1";
									$resultado_produtos = mysqli_query($conn, $result_produtos);
									$row_produtos = mysqli_fetch_assoc($resultado_produtos);
									echo $row_produtos['nome'];
								?>
							</td>
							<td class="text-center">
								<?php $situacoes_venda_id = $row_vendas["situacoes_venda_id"]; 
									$result_situacoes_vendas = "SELECT * FROM situacoes_vendas WHERE id = '$situacoes_venda_id' LIMIT 1";
									$resultado_situacoes_vendas = mysqli_query($conn, $result_situacoes_vendas);
									$row_situacoes_vendas = mysqli_fetch_assoc($resultado_situacoes_vendas);
									echo $row_situacoes_vendas['nome'];
								?>
							</td>
							<td class="text-center"><?php echo date('d/m/Y H:i:s',strtotime($row_vendas["data_venda"])); ?></td>
							<td class="text-center">
								<a href="administrativo.php?link=33&id=<?php echo $row_vendas["id"]; ?>">
									<button type="button" class="btn btn-xs btn-primary">
										Visualizar
									</button>
								</a>
								<a href="administrativo.php?link=32&id=<?php echo $row_vendas["id"]; ?>">
									<button type="button" class="btn btn-xs btn-warning">
										Editar
									</button>
								</a>
								<a href="administrativo/processa/adm_apagar_venda.php?id=<?php echo $row_vendas["id"]; ?>">
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