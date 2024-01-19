<?php
	//Buscar os dados referente ao usuario situado neste id
	$result_produtos = "SELECT * FROM central  WHERE id = '1'";
	$resultado_produtos = mysqli_query($conn, $result_produtos);
	$row_produtos = mysqli_fetch_assoc($resultado_produtos);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Sobre a Central</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo.php?link=7&id=<?php echo $row_produtos["id"]; ?>" class="btn btn-sm btn-warning">
				Editar
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">		
		<dt>Id: </dt>
		<dd><?php echo $row_produtos['id']; ?></dd>
		<dt>titulo: </dt>
		<dd class="alert alert-info" role="alert"><?php echo $row_produtos['titulo']; ?></dd>
		<dt>texto: </dt>
		<dd class="alert alert-warning" role="alert"><?php echo $row_produtos['texto']; ?></dd>
		<dt>horário dos cultos: </dt>
		<dd class="alert alert-info" role="alert"><?php echo $row_produtos['horaculto']; ?></dd>
		<dt>pastor: </dt>
		<dd class="alert alert-success" role="alert"><?php echo $row_produtos['pastor']; ?></dd>
		<dt>fotopastor: </dt>
		<dd>
		<img src="<?php echo '../imagem_geral/pastoresfoto/'.$row_produtos['fotopastor']; ?>" width="200">
		</dd>
	</dl>
</div>