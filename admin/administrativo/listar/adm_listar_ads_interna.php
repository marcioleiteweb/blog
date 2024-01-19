<?php
	$result_clientes = "SELECT * FROM ads_interna";
	$resultado_clientes = mysqli_query($conn , $result_clientes);
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista de logo Clientes</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=45"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Link de contato</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
				<?php while($row_clientes = mysqli_fetch_assoc($resultado_clientes)){?>
						<tr>
							<td class="text-center"><?php echo $row_clientes["id"]; ?></td>
							<td class="text-center"><?php echo $row_clientes["link"]; ?></td>
							<td class="text-center">
								<a href="administrativo.php?link=44&id=<?php echo $row_clientes["id"]; ?>">
									<button type="button" class="btn btn-xs btn-primary">
										Visualizar
									</button>
								</a>
								
								<a href="administrativo/processa/apaga/adm_apagar_ads_interna.php?id=<?php echo $row_clientes["id"]; ?>">
									<button type="button" class="btn btn-xs btn-danger">
										Apagar
									</button>
								</a>
							</td>
						</tr>
					<?php }?>
				</tbody>
			</table>
        </div>
	</div>
</div>