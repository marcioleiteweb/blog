<?php
	//Buscar os dados referente ao usuario situado neste id
	$result_categorias_produtos = "SELECT * FROM estado_na_home LIMIT 1";
	$resultado_categorias_produtos = mysqli_query($conn, $result_categorias_produtos);
	$row_categorias_produtos = mysqli_fetch_assoc($resultado_categorias_produtos);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Escolha do Estado na Home Page</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
		<?php if($row_categorias_produtos['id'] == 0){?>
			<a href="administrativo.php?link=32" class='btn btn-sm btn-success'>
				Cadastrar
			</a>
		<?php }else{}?>
			<a href="administrativo.php?link=33&id=<?php echo $row_categorias_produtos["id"]; ?>" class="btn btn-sm btn-warning">
				Editar
			</a>
			
			<a href="administrativo/processa/apaga/adm_apagar_estado_na_home.php?id=<?php echo $row_categorias_produtos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">
		<dt>Id: </dt>
		<dd><?php echo $row_categorias_produtos['id']; ?></dd>
		<dt>Nome: </dt>
		<dd><?php echo $row_categorias_produtos['nome_estado']; ?></dd>
	</dl>
</div>