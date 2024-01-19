<?php
	$result_produtos = "SELECT * FROM ads_home_topo";
	$resultado_produtos = mysqli_query($conn , $result_produtos);
	
		//Buscar os dados referente ao usuario situado neste id
	$result_categorias_ads_home_topo = "SELECT * FROM ads_home_topo LIMIT 1";
	$resultado_categorias_ads_home_topo = mysqli_query($conn, $result_categorias_ads_home_topo);
	$row_categorias_ads_home_topo = mysqli_fetch_assoc($resultado_categorias_ads_home_topo);	
	
	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista de ADS da Home Topo</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
		<?php if($row_categorias_ads_home_topo['id'] == 0){?>
			<a href="administrativo.php?link=42"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		<?php }?>	
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
					<?php while($row_produtos = mysqli_fetch_assoc($resultado_produtos)){?>
						<tr>
							<td class="text-center"><?php echo $row_produtos["id"]; ?></td>
							<td class="text-center"><?php echo $row_produtos["link"]; ?></td>
							<td class="text-center">
								<a href="administrativo.php?link=41&id=<?php echo $row_produtos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-primary">
										Visualizar
									</button>
								</a>
								
								<a href="administrativo/processa/apaga/adm_apagar_ads_home_topo.php?id=<?php echo $row_produtos["id"]; ?>">
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