<?php
	$result_produtos = "SELECT * FROM ads_home";
	$resultado_produtos = mysqli_query($conn , $result_produtos);
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista dos Trabalhos</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=39"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">nome trabalho</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_produtos = mysqli_fetch_assoc($resultado_produtos)){?>
						<tr>
							<td class="text-center"><?php echo $row_produtos["id"]; ?></td>
							<td class="text-center"><?php echo $row_produtos["link"]; ?></td>
							<td class="text-center">
								<a href="administrativo.php?link=38&id=<?php echo $row_produtos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-primary">
										Visualizar
									</button>
								</a>
								
								<a href="administrativo/processa/apaga/adm_apagar_ads_home.php?id=<?php echo $row_produtos["id"]; ?>">
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