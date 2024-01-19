<?php
	//Buscar os dados referente ao usuario situado neste id
	$result_servicos = "SELECT * FROM servicos";
	$resultado_servicos = mysqli_query($conn, $result_servicos);
?>

<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Nossos Serviços</h1>
	</div>
		<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo.php?link=18" class="btn btn-sm btn-success">
				Cadastrar
			</a>
		</div>
	</div>
	
<?php while($row_servicos = mysqli_fetch_assoc($resultado_servicos)){?>
<div class="container theme-showcase" role="main">

	<dl class="dl-horizontal">		
		<dt>Id: </dt>
		<dd><?php echo $row_servicos['id']; ?></dd>
		<dt>Titulo: </dt>
		<dd class="alert alert-info" role="alert"><?php echo $row_servicos['titulo']; ?>
		
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo.php?link=19&id=<?php echo $row_servicos["id"];?>" class="btn btn-sm btn-warning">
				edita
			</a>
		</div>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo/processa/apaga/adm_apagar_servicos.php?id=<?php echo $row_servicos["id"];?>" class="btn btn-sm btn-danger">
				Apagar
			</a>
		</div>
	</div>
		
		</dd>
		<dt>Conteudo: </dt>
		<dd class="alert alert-warning" role="alert"><?php echo $row_servicos['texto']; ?></dd>
	</dl>
</div>
<?php }?>	
</div>





