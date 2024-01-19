<?php
	$result_produtos = "SELECT * FROM classificados";
	$resultado_produtos = mysqli_query($conn , $result_produtos);
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista Blog</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=29"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Titulo</th>
						<th class="text-center">Fonte</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_produtos = mysqli_fetch_assoc($resultado_produtos)){?>
						<tr>
							<td class="text-center"><?php echo $row_produtos["id"]; ?></td>
							<td class="text-center"><?php echo $row_produtos["titulo"]; ?></td>
							<td class="text-center"><?php echo $row_produtos["contato_bt"]; ?></td>
							<td class="text-center">
								<a href="administrativo.php?link=28&id=<?php echo $row_produtos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-primary">
										Visualizar
									</button>
								</a>
								
								<a href="administrativo.php?link=30&id=<?php echo $row_produtos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-warning">
										Editar
									</button>
								</a>
								
								<a href="administrativo/processa/apaga/adm_apagar_classificados.php?id=<?php echo $row_produtos["id"]; ?>">
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