<?php
	$result_categorias_estados = "SELECT * FROM estados";
	$resultado_categorias_estados = mysqli_query($conn , $result_categorias_estados);
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista Estados Cadastrados</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=21"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Nome</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_categorias_estados = mysqli_fetch_assoc($resultado_categorias_estados)){?>
						<tr>
							<td class="text-center"><?php echo $row_categorias_estados["id"]; ?></td>
							<td class="text-center"><?php echo $row_categorias_estados["nome"]; ?></td>
							<td class="text-center">
								<a class="btn btn-xs btn-warning" href="administrativo.php?link=22&id=<?php echo $row_categorias_estados["id"]; ?>">
									Editar
								</a>
								<a class="btn btn-xs btn-danger" href="administrativo/processa/apaga/adm_apagar_estado.php?id=<?php echo $row_categorias_estados["id"]; ?>">
									Apagar
								</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
        </div>
	</div>
</div>